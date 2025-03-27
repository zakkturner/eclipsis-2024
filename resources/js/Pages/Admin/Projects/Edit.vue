<script setup lang="ts">
import {Project, ProjectPhoto} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DashboardContainer from "@/Components/UI/DashboardContainer.vue";
import PhotosForm from "@/Components/Form/PhotoForms/PhotosForm.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import {reactive} from "vue";
import {Client} from "@/types/types";
import FormGroup from "@/Components/Form/FormGroup.vue";
import {router} from '@inertiajs/vue3'
import TextArea from "@/Components/Form/TextArea.vue";
import LinkButton from "@/Components/LinkButton.vue";

const props = defineProps<{
  project: Project;
  project_photos: ProjectPhoto[]
  client: Client,
  clients: Client[],
}>()
const form = reactive({
  title: props.project.title,
  description: props.project.description,
  launch_date: props.project.launch_date,
  website_url: props.project.website_url,
  client: props.client
});

const handleSubmit = () => {
  // alert('working');
  router.post(`/admin/projects/${props.project.id}`, {
    _method: 'put',
    title: form.title,
    description: form.description,
    launch_date: form.launch_date,
    website_url: form.website_url,
    client_id: form.client.id
  });
}
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects Edit</h2>
    </template>
    <DashboardContainer>
      <div class="flex justify-between items-center my-6">
        <h1 class="text-3xl font-bold mb-4">Edit {{ project.title }}</h1>
        <link-button link="/admin/projects">Back to All Projects</link-button>
      </div>
      <form @submit.prevent="handleSubmit">
        <form-group text="Project Title" for="title">
          <text-input v-model="form.title" name="title"/>
        </form-group>
        <form-group for="description">
          <text-area rows="15" v-model="form.description" name="description"/>
        </form-group>
        <form-group for="client">
          <select>
            <option v-for="clientItem in clients"
                    :selected="clientItem.id == client.id"
            >{{ clientItem.name }}
            </option>
          </select>
        </form-group>
        <form-group for="launch_date" text="Launch Date">
          <input type="date" v-model="form.launch_date">
        </form-group>
        <form-group for="website_url" text="Website Url">
          <text-input v-model="form.website_url"></text-input>
        </form-group>
        <button class="mt-4 bg-green-800 text-white rounded py-4 px-6">Save</button>
      </form>
      <hr class="my-4"/>
      <div>
        <div class="m-2">
          <h2 class="text-xl">Edit Photos</h2>
        </div>
        <photos-form :photos="project_photos"></photos-form>
      </div>
    </DashboardContainer>
  </AuthenticatedLayout>
</template>

