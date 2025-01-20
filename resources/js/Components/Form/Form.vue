<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TextArea from "@/Components/Form/TextArea.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import DashboardContainer from "@/Components/UI/DashboardContainer.vue";
import FormGroup from "@/Components/Form/FormGroup.vue";
import PhotosForm from "@/Components/Form/PhotoForms/PhotosForm.vue";
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects Edit</h2>
    </template>
    <DashboardContainer>
      <h1 class="text-3xl font-bold mb-4">Edit {{ project.title }}</h1>
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

<style scoped>

</style>