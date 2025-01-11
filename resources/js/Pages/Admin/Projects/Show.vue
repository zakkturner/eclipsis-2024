<script setup lang="ts">
import {Project, ProjectPhoto} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DashboardContainer from "@/Components/UI/DashboardContainer.vue";
import PhotosForm from "@/Components/Dashboard/PhotosForm.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import {reactive} from "vue";
import {Client} from "@/types/types";
import FormGroup from "@/Pages/Admin/Projects/FormGroup.vue";
import { router } from '@inertiajs/vue3'
import TextArea from "@/Components/Form/TextArea.vue";

const props = defineProps<{
  project: Project;
  project_photos: ProjectPhoto[]
  client: Client
}>()

</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects Edit</h2>
    </template>
    <DashboardContainer>
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold mb-4">{{project.title}}</h1>
            <a class="bg-yellow-400 font-black text-white flex items-center px-4 rounded" :href="`/admin/projects/${project.id}/edit`">Edit Project</a>
        </div>
          <form-group for="description">
              <p>{{project.description}}</p>
          </form-group>
          <form-group for="client">
              <p><a :href="`/admin/clients/${client.id}`">{{client.name}}</a></p>
          </form-group>
           <form-group for="launch_date" text="Launch Date">
               <p>{{project.launch_date}}</p>
           </form-group>
            <form-group for="website_url" text="Website Url">
                <p> <a class="hover:text-eclipsis-gold transition-all transition-duration-300 ease-in-out" :href="project.website_url">{{project.website_url}}</a></p>
            </form-group>

      <hr class="my-4"/>
      <div>
          <div class="m-2">
              <h2 class="text-xl font-bold">Project Photos</h2>
          </div>
        <photos-form :showPage="true" :photos="project_photos"></photos-form>
      </div>
    </DashboardContainer>
  </AuthenticatedLayout>
</template>

