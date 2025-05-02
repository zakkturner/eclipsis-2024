<script setup lang="ts">
import {Project, ProjectPhoto} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DashboardContainer from "@/Components/UI/DashboardContainer.vue";
import PhotosForm from "@/Components/Form/PhotoForms/PhotosForm.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import {reactive, ref} from "vue";
import {Client, Service} from "@/types/types";
import FormGroup from "@/Components/Form/FormGroup.vue";
import {router} from '@inertiajs/vue3'
import TextArea from "@/Components/Form/TextArea.vue";

const add_photo = ref(false);
const form = reactive({
  title: "",
  subtitle: "",
  body: "",
  button_text: "",
  button_link: "",
  background_color: "",
  text_color: "",
  is_active: false,
  alt: "",
  img_src: null,
  active: false
});
const colors = [
  'blue',
  'yellow',
  'white',
  'gray'
]
const handleSubmit = () => {
  // alert('working');
  router.post(`/admin/ctas`, form);
}
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">CTA Create</h2>
    </template>
    <DashboardContainer>
      <h1 class="text-3xl font-bold mb-4">Add CTA</h1>
      <form @submit.prevent="handleSubmit">
        <form-group text="CTA Title" for="title">
          <text-input v-model="form.title" name="title"/>
        </form-group>
        <form-group text="CTA SubTitle" for="subtitle">
          <text-input v-model="form.subtitle" name="subtitle"/>
        </form-group>
        <form-group for="body">
          <text-area rows="4" v-model="form.body" name="body"/>
        </form-group>
        <form-group for="button_text" text="Button Text">
          <input type="text" v-model="form.button_text">
        </form-group>
        <form-group for="button_link" text="Button Link">
          <input type="text" v-model="form.button_link">
        </form-group>
        <form-group for="background_color" text="Background Color">
          <select v-model="form.background_color">
            <option selected disabled></option>
            <option v-for="color in colors" class="capitalize"
                    :value="color"
            >{{ color }}
            </option>
          </select>
        </form-group>
        <form-group for="text_color" text="Text Color">
          <select v-model="form.text_color">
            <option selected disabled></option>
            <option v-for="color in colors" class="capitalize"
                    :value="color"
            >{{ color }}
            </option>
          </select>
          <form-group for="is_active" text="Activate?">
            <select v-model="form.is_active">
              <option selected disabled></option>
              <option :value="1">Activate</option>
              <option :value="false">Disabled</option>
            </select>
          </form-group>
          <form-group for="Add Photo?">
            <input type="checkbox" v-model="add_photo">

          </form-group>
          <div v-if="add_photo">
            <form-group for="Photo">
              <input type="file" @input="form.img_src = $event.target.files[0]"/>
            </form-group>
            <form-group for="Photo Alt">
              <input type="text" v-model="form.alt">
            </form-group>
            <form-group for="Photo Active">
              <select v-model="form.active">
                <option selected disabled></option>
                <option :value="1">Activate</option>
                <option :value="false">Disabled</option>
              </select>
            </form-group>
          </div>

        </form-group>


        <button class="mt-4 bg-green-800 text-white rounded py-4 px-6">Save</button>
      </form>

    </DashboardContainer>
  </AuthenticatedLayout>
</template>

