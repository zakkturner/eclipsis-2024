<script setup lang="ts">
import {Project} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CustomTable from "@/Components/CustomTable.vue";
import NavLink from "@/Components/NavLink.vue";
import {Client} from "@/types/types";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faPencil, faTrash} from "@fortawesome/free-solid-svg-icons";
import Modal from "@/Components/Modal.vue";
import {nextTick, onMounted, ref} from "vue";
import CancelButton from "@/Components/CancelButton.vue";
import {router} from "@inertiajs/vue3";
import gsap from 'gsap';
import DangerButton from "@/Components/DangerButton.vue";
import LinkButton from "@/Components/LinkButton.vue";

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
  'Actions'
];

const msgContainer = ref(null)
const message = ref('');
const isOpen = ref(false);
const selectedClient = ref(null)
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


</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clients</h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <div class="w-full mx-auto flex flex-col justify-center">
              <div class="flex w-full justify-end mb-10">

                <link-button
                    bg="bg-green-700"
                    class="   px-4 py-2 rounded text-white! border-4 border-green-700 hover:bg-white transition-all group
                          ease-in-out" link="/admin/clients/create"><span class="text-white group-hover:text-green-700 ">Add Client</span>
                </link-button>
              </div>
              <custom-table :tableHeadings="tableHeadings">
                <template #default>
                  <tr v-for="client in clients" :key="client.id" class="border-eclipsis-navy border-t-2 first:border-t-0 last:border-b-2">
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
                      <a :href="client.website_url" class="text-blue-600 underline">{{ client.website_url }}</a>
                    </td>

                    <!-- Budget -->
                    <td class="border-r-2 border-eclipsis-navy flex-1 p-2">
                      {{ client.budget }}
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <Teleport to="body">
      <div ref="msgContainer" class="fixed z-99 bottom-2 right-2 shadow bg-white p-4 rounded " v-if="message">
        <p class="text-green-600 font-bold text-lg">{{ message }}</p>
      </div>
    </Teleport>
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