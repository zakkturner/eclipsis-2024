<script setup lang="ts">
import {Project} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CustomTable from "@/Components/CustomTable.vue";
import NavLink from "@/Components/NavLink.vue";
import {Client} from "@/types/types";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faPencil, faTrash} from "@fortawesome/free-solid-svg-icons";
import Modal from "@/Components/Modal.vue";
import {nextTick, onMounted, reactive, ref, watch} from "vue";
import CancelButton from "@/Components/CancelButton.vue";
import {router} from "@inertiajs/vue3";
import gsap from 'gsap';
import DangerButton from "@/Components/DangerButton.vue";
import LinkButton from "@/Components/LinkButton.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
import FormSelect from "@/Components/Form/FormSelect.vue";
import FormGroup from "@/Components/Form/FormGroup.vue";
import TableCard from "@/Components/UI/TableCard.vue";

const props = defineProps<{
  clients: Client[]
}>()
const tableHeadings = [
  'company',
  'contact name',
  'email',
  'phone',
  'website url',
  'budget',
  'source',
  'status',
  'Actions'
];
const filteredClients = ref(props.clients);
const msgContainer = ref(null)
const message = ref('');
const isOpen = ref(false);
const selectedClient = ref(null)
const filters = reactive({
  status: "all",
  lead_source: "all",
  budget: 'all'
})
const messageAnimation = async () => {
  await nextTick();
  gsap.fromTo(msgContainer.value, {x: 200, opacity: 0}, {x: 0, duration: .7, opacity: 1, ease: 'power3.inOut', delay: .5});
  setTimeout(() => {
    gsap.to(msgContainer.value, {x: 200, opacity: 0, duration: .5, ease: 'power3.inOut'});
  }, 5000)
}
const handleDelete = () => {
  router.delete('/admin/clients/' + selectedClient.value, {
    preserveScroll: true, // Prevents scrolling to top on validation error
    onSuccess: () => {
      message.value = "Deleted Client Successfully"
      messageAnimation()
    },
    onError: (errors) => {
      message.value = "Error deleting your message: " + errors // Debugging errors
      messageAnimation()
    }
  });


  isOpen.value = false
}
const statusFilters = [
  {label: "All", value: "all"},
  {label: "Lead", value: "lead"},
  {label: "Prospect", value: "prospect"},
  {label: "Negotiation", value: "negotiation"},
  {label: "Customer", value: "customer"},
  {label: "Inactive", value: "inactive"},
  {label: "Lost", value: "lost"},
]
const sourceFilters = [
  {label: "All", value: "all"},
  ...Array.from(
      new Set(props.clients.map(c => c.lead_source))
  ).filter(Boolean).map(source => ({
    label: source,
    value: source,
  }))];
// const handleStatusFilter = () => {
//   if (filters.status == 'all') {
//     filteredClients.value = props.clients
//     return
//   }
//   filteredClients.value = props.clients.filter(client => {
//     return client.status == filters.status;
//   });
// }
// const handleSourceFilter = () => {
//   if (filters.lead_source == 'all') {
//     filteredClients.value = props.clients
//     return
//   }
//   filteredClients.value = props.clients.filter(client => {
//     return client.lead_source == filters.lead_source;
//   });
// }
const applyFilters = () => {
  filteredClients.value = props.clients.filter(client => {
    const matchesStatus = filters.status === 'all' || client.status === filters.status;
    const matchesSource = filters.lead_source === 'all' || client.lead_source === filters.lead_source;
    return matchesStatus && matchesSource;
  });
}
// Run on initial load
onMounted(() => {
  applyFilters();
});

// Reactive update when filters change
watch(() => [filters.status, filters.lead_source], applyFilters);
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clients</h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class=" text-gray-900">
            <table-card>
              <template #filters>
                <form-group for="" text="Filter By Status" class="mr-4">
                  <form-select @change="applyFilters" :data-prop="statusFilters" :key="filters.status" v-model="filters.status"
                               label="Filter By Status"></form-select>
                </form-group>
                <form-group for="" text="Filter By Lead Source" class="mr-4">
                  <form-select @change="applyFilters" :data-prop="sourceFilters" :key="filters.lead_source" v-model="filters.lead_source"
                               label="Filter By Lead Source"></form-select>
                </form-group>
                <form-group for="" text="Filter By Budget">
                  <form-select @change="applyFilters" :data-prop="sourceFilters" :key="filters.lead_source" v-model="filters.lead_source"
                               label="Filter By Budget"></form-select>
                </form-group>
              </template>
              <template #add-btn>
                <link-button
                    bg="bg-green-700"
                    class="   px-4 py-2 rounded text-white! border-4 border-green-700 hover:bg-white transition-all group
                                            ease-in-out" link="/admin/clients/create"><span
                    class="text-white group-hover:text-green-700 ">Add Client</span>
                </link-button>
              </template>
              <template #table>
                <custom-table :tableHeadings="tableHeadings" :pagination="{
                  show: true,
                  totalItems: filteredClients.length,
                  itemsPerPage: 10,
                  data: filteredClients
                }">
                  <template #default="{data}">
                    <tr v-for="client in data" :key="client.id" class="border-eclipsis-navy border-t-2 first:border-t-0 last:border-b-2">
                      <!-- Company -->
                      <td class="border-r-2 border-l-2 border-eclipsis-navy flex-1 p-2">
                        {{ client.company }}
                      </td>

                      <!-- Contact Name -->
                      <td class="border-r-2 border-eclipsis-navy flex-1 p-2">
                        {{ client.name }}
                      </td>

                      <!-- Email -->
                      <td class="border-r-2 border-eclipsis-navy flex-1 p-2 break-words overflow-hidden whitespace-normal">
                        {{ client.email }}
                      </td>

                      <!-- Phone -->
                      <td class="border-r-2 border-eclipsis-navy flex-1 p-2">
                        {{ client.phone }}
                      </td>

                      <!-- Website URL -->
                      <td class="border-r-2 border-eclipsis-navy flex-1 p-2">
                        <a :href="client.website_url" class="text-blue-600 underline" target="_blank">{{ client.website_url }}</a>
                      </td>

                      <!-- Budget -->
                      <td class="border-r-2 border-eclipsis-navy flex-1 p-2">
                        {{ client.budget }}
                      </td>
                      <td class="border-r-2 border-eclipsis-navy flex-1 p-2">
                        {{ client.lead_source ?? 'N/A' }}
                      </td>
                      <td class="border-r-2 border-eclipsis-navy flex-1 p-2 capitalize">
                        {{ client.status }}
                      </td>
                      <!-- Edit Button -->
                      <td class="border-r-2 border-eclipsis-navy flex-1 flex justify-center items-center py-2">
                        <NavLink
                            class="bg-eclipsis-gold mr-2 px-4 py-2 rounded text-white border-4 border-eclipsis-gold
                                                     hover:bg-eclipsis-navy hover:text-black hover:border-eclipsis-gold transition-all ease-in-out transition duration-700 ease-in-out group"
                            :href="'/admin/clients/' + client.id + '/edit'">
                                              <span class="text-eclipsis-navy group-hover:text-eclipsis-gold">
                                                <font-awesome-icon :icon="faPencil"></font-awesome-icon>
                                              </span>
                        </NavLink>

                        <button @click="isOpen = true, selectedClient = client.id"
                                class="bg-red-600 px-4 py-1 rounded text-white border-4 border-red-600 hover:bg-white hover:text-black transition-all ease-in-out">
                          <font-awesome-icon :icon="faTrash"></font-awesome-icon>
                        </button>
                      </td>


                    </tr>
                  </template>
                </custom-table>
              </template>
            </table-card>
          </div>
        </div>
      </div>
    </div>

    <flash-message :message="$page.props.flash.message"></flash-message>
    <modal :show="isOpen">
      <div class="m-4 flex flex-col items-center">
        <h4 class="py-4">Are you sure you want to delete?</h4>
        <div>
          <danger-button @click.prevent="handleDelete" class="mr-2">Delete</danger-button>
          <cancel-button @click.prevent="isOpen = false, selectedClient = null">Cancel</cancel-button>
        </div>
      </div>

    </modal>
  </AuthenticatedLayout>
</template>