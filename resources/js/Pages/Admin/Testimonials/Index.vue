<script setup lang="ts">
import {Project} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CustomTable from "@/Components/CustomTable.vue";
import NavLink from "@/Components/NavLink.vue";
import {Client, Testimonial} from "@/types/types";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faEye, faPencil, faTrash} from "@fortawesome/free-solid-svg-icons";
import Modal from "@/Components/Modal.vue";
import {nextTick, onMounted, ref} from "vue";
import CancelButton from "@/Components/CancelButton.vue";
import {router} from "@inertiajs/vue3";
import gsap from 'gsap';
import DangerButton from "@/Components/DangerButton.vue";
import dayjs from "dayjs";
import {useFormatDate} from "@/Composables/useFormatDate";
import LinkButton from "@/Components/LinkButton.vue";


const props = defineProps<{
  testimonials: Testimonial[]
}>()
const tableHeadings = [
  'name',
  'client',

  'created date',
  'actions'

];

const msgContainer = ref(null)
const message = ref('');
const isOpen = ref(false);
const selectedTestimonial = ref(null)
const messageAnimation = async () => {
  await nextTick();
  gsap.fromTo(msgContainer.value, {x: 200, opacity: 0}, {x: 0, duration: .7, opacity: 1, ease: 'power3.inOut', delay: .5});
  setTimeout(() => {
    gsap.to(msgContainer.value, {x: 200, opacity: 0, duration: .5, ease: 'power3.inOut'});
  }, 5000)
}
const handleDelete = () => {
  router.delete('/admin/testimonials/' + selectedTestimonial.value, {
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

const {formattedDate} = useFormatDate()
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Testimonials</h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <div class="w-full mx-auto flex flex-col justify-center">
              <div class="flex w-full justify-end mb-10">

                <link-button
                    class="bg-green-700   px-4 py-2 rounded text-white! border-4 border-green-700 hover:bg-white group hover:text-black transition-all
                          ease-in-out" link="/admin/testimonials/create"><span class="text-white group-hover:text-green-700">Add Testimonial</span>
                </link-button>
              </div>
              <custom-table :tableHeadings="tableHeadings" v-if="testimonials.length > 0">
                <li v-for="testimonial in testimonials" :key="testimonial.id"
                    class="border-eclipsis-navy border-t-2 first:border-t-0 last:border-b-2">
                  <div class="grid grid-cols-4">
                    <!-- Company -->

                    <!-- Contact Name -->
                    <div class="border-r-2 border-eclipsis-navy flex-1 p-2">
                      {{ testimonial.name }}
                    </div>

                    <!-- Email -->
                    <div class="border-r-2 border-eclipsis-navy flex-1 p-2 break-words overflow-hidden whitespace-normal">
                      {{ testimonial.client.name }}
                    </div>
                    <div class="border-r-2 border-eclipsis-navy flex-1 p-2">
                      {{ useFormatDate(testimonial.created_at).formattedDate }}
                    </div>


                    <!-- Edit Button -->
                    <div class="border-r-2 border-eclipsis-navy flex-1 flex justify-center items-center py-2">
                      <NavLink
                          class="bg-eclipsis-navy mr-2 px-4 py-2 rounded text-white border-4 border-eclipsis-navy
                                   hover:bg-eclipsis-gold hover:text-black hover:border-eclipsis-navy transition-all ease-in-out transition duration-700 ease-in-out group"
                          :href="'/admin/testimonials/' + testimonial.id ">
                            <span class="text-eclipsis-gold group-hover:text-eclipsis-navy">
                              <font-awesome-icon :icon="faEye"></font-awesome-icon>
                            </span>
                      </NavLink>
                      <NavLink
                          class="bg-eclipsis-gold mr-2 px-4 py-2 rounded text-white border-4 border-eclipsis-gold
                                   hover:bg-eclipsis-navy hover:text-black hover:border-eclipsis-gold transition-all ease-in-out transition duration-700 ease-in-out group"
                          :href="'/admin/testimonials/' + testimonial.id + '/edit'">
                            <span class="text-eclipsis-navy group-hover:text-eclipsis-gold">
                              <font-awesome-icon :icon="faPencil"></font-awesome-icon>
                            </span>
                      </NavLink>

                      <button @click="isOpen = true, selectedTestimonial = testimonial.id"
                              class="bg-red-600 px-4 py-1 rounded text-white border-4 border-red-600 hover:bg-white hover:text-black transition-all ease-in-out">
                        <font-awesome-icon :icon="faTrash"></font-awesome-icon>
                      </button>
                    </div>

                    <!-- Delete Button -->

                  </div>
                </li>
              </custom-table>
              <custom-table :tableHeadings="tableHeadings" v-else>
                <li>No Data Added</li>
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
          <cancel-button @click.prevent="isOpen = false, selectedTestimonial = null">Cancel</cancel-button>
        </div>
      </div>

    </modal>
  </AuthenticatedLayout>
</template>