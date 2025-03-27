<script setup lang="ts">
import {ref} from "vue";
import {Project} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CustomTable from "@/Components/CustomTable.vue";
import NavLink from "@/Components/NavLink.vue";
import LinkButton from "@/Components/LinkButton.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faPencil, faTrashCan} from "@fortawesome/free-solid-svg-icons";
import Modal from "@/Components/Modal.vue";
import {selector} from "gsap-trial/src/all";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {router} from "@inertiajs/vue3";
import FlashMessage from "@/Components/FlashMessage.vue";

const props = defineProps<{
  projects: Project[]
}>();
const isOpen = ref(false);
const selectedProject = ref<Project>();
const tableHeadings = [
  'title',
  'client',
  'description',
  'launch date',
  'website url',
  'Actions',

];
const message = ref("")
const handleDeleteModal = (project: Project) => {
  isOpen.value = true
  selectedProject.value = project
}
const handleDelete = () => {
  router.delete('/admin/projects/' + selectedProject.value.id, {
    preserveScroll: true, // Prevents scrolling to top on validation error
    onSuccess: () => {
      message.value = "Deleted Project Successfully"
    },
    onError: (errors) => {
      message.value = "Error deleting your project: " + errors // Debugging errors
    }
  });


  isOpen.value = false
  message.value = "";
}
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects</h2>
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
                          ease-in-out" link="/admin/projects/create"><span class="text-white group-hover:text-green-700">Add Project</span>
                </link-button>
              </div>
              <custom-table v-if="projects.length > 0" :tableHeadings="tableHeadings">
                <template #default>
                  <tr v-for="project in projects" :key="project.id" class="border-eclipsis-navy border-t-2 first:border-t-0 last:border-b-2">
                    <td class="border border-eclipsis-navy p-2">{{ project.title }}</td>
                    <td class="border border-eclipsis-navy p-2">{{ project.client.name }}</td>
                    <td class="border border-eclipsis-navy p-2">{{ project.description }}</td>
                    <td class="border border-eclipsis-navy p-2">{{ project.launch_date }}</td>
                    <td class="border border-eclipsis-navy p-2">{{ project.website_url }}</td>
                    <td class="border border-eclipsis-navy p-2 text-center">
                      <div class="flex">
                        <link-button
                            class="bg-eclipsis-gold mr-2 px-4 py-2 rounded text-white border-4 border-eclipsis-gold hover:bg-white  group transition-all ease-in-out flex items-center"
                            :link="'/admin/projects/' + project.id + '/edit'"
                        >
                          <span class="group-hover:text-eclipsis-gold">
                            <font-awesome-icon :icon="faPencil"></font-awesome-icon>
                          </span>
                        </link-button>
                        <button
                            @click="handleDeleteModal(project)"
                            class="bg-red-600 px-4 py-2 rounded text-white border-4 border-red-600 hover:bg-white hover:text-black transition-all ease-in-out"
                        >
                          <font-awesome-icon :icon="faTrashCan"></font-awesome-icon>
                        </button>
                      </div>
                    </td>

                  </tr>
                </template>
              </custom-table>
              <custom-table :tableHeadings="tableHeadings" v-else>
                <li>No data added.</li>
              </custom-table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <flash-message :message="message"></flash-message>
    <modal :show="isOpen">
      <div class="p-4 flex justify-center flex-col items-center">
        <h4>Are you sure you want to delete <em class="font-semibold">{{ selectedProject.title }}</em>?</h4>
        <div class="py-4">
          <danger-button @click="handleDelete" class="mr-4">Delete</danger-button>
          <secondary-button @click="isOpen = false">Cancel</secondary-button>
        </div>
      </div>
    </modal>
  </AuthenticatedLayout>
</template>