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

const props = defineProps<{

  clients: Client[],
}>()
const form = reactive({
  title: "",
  description: "",
  launch_date: "",
  website_url: "",
  client_id: ""
});

const handleSubmit = () => {
  // alert('working');
  router.post(`/admin/projects`, form);
}
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects Edit</h2>
    </template>
    <DashboardContainer>
      <h1 class="text-3xl font-bold mb-4">Add Project</h1>
      <form @submit.prevent="handleSubmit">
        <form-group text="Project Title" for="title">
          <text-input v-model="form.title" name="title"/>
        </form-group>
        <form-group for="description">
          <text-area rows="15" v-model="form.description" name="description"/>
        </form-group>
        <form-group for="client">
          <select v-model="form.client_id">
            <option selected disabled></option>
            <option v-for="clientItem in clients"
                    :value="clientItem.id"
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
      <!--      <hr class="my-4"/>-->
      <!--      <div>-->
      <!--        <div class="m-2">-->
      <!--          <h2 class="text-xl">Add Photos</h2>-->
      <!--        </div>-->
      <!--        <photos-form :photos="project_photos"></photos-form>-->
      <!--      </div>-->
    </DashboardContainer>
  </AuthenticatedLayout>
</template>

