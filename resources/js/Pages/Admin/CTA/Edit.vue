<script setup lang="ts">
import {Project, ProjectPhoto} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DashboardContainer from "@/Components/UI/DashboardContainer.vue";
import PhotosForm from "@/Components/Form/PhotoForms/PhotosForm.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import {reactive} from "vue";
import {CTA} from "@/types/types";
import FormGroup from "@/Components/Form/FormGroup.vue";
import {router} from '@inertiajs/vue3'
import TextArea from "@/Components/Form/TextArea.vue";

const props = defineProps<{
  cta: CTA
}>()
const form = reactive({
  title: props.cta.title || "",
  subtitle: props.cta.subtitle || "",
  body: props.cta.body || "",
  button_text: props.cta.button_text || "",
  button_link: props.cta.button_link || "",
  background_color: props.cta.background_color || "",
  text_color: props.cta.text_color || "",
  is_active: props.cta.is_active || false,
});
const colors = [
  'blue',
  'yellow',
  'white',
  'gray'
]
const handleSubmit = () => {
  // alert('working');
  router.post(`/admin/ctas/${props.cta.id}`, {
    _method: 'put',
    title: form.title,
    subtitle: form.subtitle,
    body: form.body,
    button_text: form.button_text,
    button_link: form.button_link,
    background_color: form.background_color,
    text_color: form.text_color,
    is_active: form.is_active,
  });
}
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">CTA Edit</h2>
    </template>
    <DashboardContainer>
      <h1 class="text-3xl font-bold mb-4">Edit CTA</h1>
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
        </form-group>
        <form-group for="is_active" text="Activate?">
          <select v-model="form.is_active">
            <option selected disabled></option>
            <option :value="1">Activate</option>
            <option :value="false">Disabled</option>
          </select>
        </form-group>

        <button class="mt-4 bg-green-800 text-white rounded py-4 px-6">Save</button>
      </form>

    </DashboardContainer>
  </AuthenticatedLayout>
</template>

