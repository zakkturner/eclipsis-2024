<script setup lang="ts">
import {Project} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CustomTable from "@/Components/CustomTable.vue";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps<{
  projects: Project[]
}>()
const tableHeadings = [
  'title',
  'client',
  'description',
  'launch date',
  'website url',
  'edit',
  'delete'
];

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
              
                <NavLink
                    class="bg-green-700   px-4 py-2 rounded text-white! border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
                          ease-in-out" href="/admin/projects/create"><span class="text-white">Add Project</span>
                </NavLink>
              </div>
              <custom-table :tableHeadings="tableHeadings">
                <li v-for="project in projects" :key="project.id" class="border-eclipsis-navy border-t-2 first:border-t-0 last:border-b-2">
                  <div class="flex justify-between">

                    <div class="border-r-2 border-l-2 border-eclipsis-navy w-1/3 p-2">
                      {{ project.title }}
                    </div>
                    <div class="border-r-2  border-eclipsis-navy w-1/3 p-2">
                      {{ project.client.name }}
                    </div>
                    <div class="border-r-2  border-eclipsis-navy w-1/3 p-2">
                      {{ project.description }}
                    </div>
                    <div class="border-r-2 border-eclipsis-navy w-1/3 p-2">
                      {{ project.launch_date }}
                    </div>
                    <div class="border-r-2 border-eclipsis-navy w-1/3 p-2">
                      {{ project.website_url }}
                    </div>
                    <div class="w-1/3 border-r-2  border-eclipsis-navy flex justify-center items-center py-2">

                      <NavLink
                          class="bg-eclipsis-gold   px-4 py-2 rounded text-white! border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
                          ease-in-out" :href="'/admin/projects/' + project.id + '/edit'"><span class="text-white">Edit</span>
                      </NavLink>
                    </div>
                    <div class="w-1/3 border-r-2  border-eclipsis-navy flex justify-center items-center py-2">


                      <button @click=""
                              class="bg-red-600 px-4 py-2 rounded text-white border-4 border-red-600 hover:bg-white hover:text-black transition-all
                          ease-in-out">Delete
                      </button>


                    </div>

                  </div>
                </li>
              </custom-table>

            </div>
          </div>
        </div>
      </div>
    </div>

  </AuthenticatedLayout>
</template>