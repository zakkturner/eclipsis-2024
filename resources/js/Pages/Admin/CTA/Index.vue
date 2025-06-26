<script setup lang="ts">

import {faPencil, faTrash} from "@fortawesome/free-solid-svg-icons";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DangerButton from "@/Components/DangerButton.vue";
import CustomTable from "@/Components/CustomTable.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import NavLink from "@/Components/NavLink.vue";
import CancelButton from "@/Components/CancelButton.vue";
import LinkButton from "@/Components/LinkButton.vue";
import Modal from "@/Components/Modal.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
import {computed, ref} from "vue";
import {router, usePage} from "@inertiajs/vue3";
import {CTA} from "@/types/types";


const flash = computed(() => usePage().props.flash);
const props = defineProps<{
  ctas: CTA[];
}>()
const tableHeadings = [
  'title',
  'subtitle',
  'objective',
  'clicks',
  'conversions',
  'Active',
  'Actions'
]
const isOpen = ref(false);
const selectedCTA = ref<CTA>();
const handleDeleteModal = (CTA: CTA) => {
  isOpen.value = true
  selectedCTA.value = CTA
}

const handleDelete = () => {
  router.delete('/admin/ctas/' + selectedCTA.value.id, {
    preserveScroll: true, // Prevents scrolling to top on validation error
    onSuccess: () => {
      // flash.message.value = "Deleted CTA Successfully"
      isOpen.value = false
    },
    // onError: (errors) => {
    //   message.value = "Error deleting your CTA: " + errors // Debugging errors
    // }
  })
}
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ctas</h2>
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
                          ease-in-out" link="/admin/ctas/create"><span class="text-white group-hover:text-green-700 ">Add cta</span>
                </link-button>
              </div>
              <custom-table :tableHeadings="tableHeadings">
                <template #default>
                  <tr v-for="cta in ctas" :key="cta.id" class="border-eclipsis-navy border-t-2 first:border-t-0 last:border-b-2">
                    <!-- Company -->
                    <td class="border-r-2 border-l-2 border-eclipsis-navy flex-1 p-2">
                      {{ cta.title }}
                    </td>

                    <!-- Contact Name -->
                    <td class="border-r-2 border-eclipsis-navy flex-1 p-2">
                      {{ cta.subtitle }}
                    </td>

                    <!-- Email -->
                    <td class="border-r-2 border-eclipsis-navy flex-1 p-2 break-words overflow-hidden whitespace-normal">
                      {{ cta.button_text }}
                    </td>

                    <!-- Phone -->
                    <td class="border-r-2 border-eclipsis-navy flex-1 p-2">
                      {{ cta.click_count }}
                    </td>

                    <!-- Website URL -->
                    <td class="border-r-2 border-eclipsis-navy flex-1 p-2">
                      {{ cta.conversion_count }}
                    </td>

                    <!-- Budget -->
                    <td class="border-r-2 border-eclipsis-navy flex-1 p-2">
                      {{ cta.is_active ? 'Yes' : 'No' }}
                    </td>

                    <!-- Edit Button -->
                    <td class="border-r-2 border-eclipsis-navy flex-1 flex justify-center items-center py-2">
                      <NavLink
                          class="bg-eclipsis-gold mr-2 px-4 py-2 rounded text-white border-4 border-eclipsis-gold
                                   hover:bg-eclipsis-navy hover:text-black hover:border-eclipsis-gold transition-all ease-in-out transition duration-700 ease-in-out group"
                          :href="'/admin/ctas/' + cta.id + '/edit'">
                            <span class="text-eclipsis-navy group-hover:text-eclipsis-gold">
                              <font-awesome-icon :icon="faPencil"></font-awesome-icon>
                            </span>
                      </NavLink>

                      <button @click="handleDeleteModal(cta)"
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
    <flash-message :message="$page.props.flash.message"></flash-message>
    <modal :show="isOpen">
      <div class="m-4 flex flex-col items-center">
        <h4 class="py-4">Are you sure you want to delete?</h4>
        <div>
          <danger-button @click.prevent="handleDelete" class="mr-2">Delete</danger-button>
          <cancel-button @click.prevent="isOpen = false, selectedCTA = null">Cancel</cancel-button>
        </div>
      </div>

    </modal>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>