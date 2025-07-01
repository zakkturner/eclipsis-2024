<script setup lang="ts">

import Form from "@/Components/Form/Form.vue";
import FormGroup from "@/Components/Form/FormGroup.vue";
import TextArea from "@/Components/Form/TextArea.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {router, useForm} from "@inertiajs/vue3";

const props = defineProps<{
  site_content: any
}>()
const form = useForm({
  headline_title: props.site_content?.headline_title || "",
  headline_text: props.site_content?.headline_text || "",
  headline_button_text: props.site_content?.headline_button_text || "",
  about_text: props.site_content?.about_text || "",
  footer_about: props.site_content?.footer_about || "",


});

const handleSubmit = async () => {

  try {

    await router.post('/admin/site-content', form);
  } catch (error) {

    console.log(error)
  }
}
</script>

<template>
  <h4 class="font-bold mb-4 text-lg">Site Content Settings</h4>
  <form @submit.prevent="handleSubmit">
    <form-group for="Headline Title">
      <text-input type="text" placeholder="Enter Headline Title" v-model="form.headline_title" name="headline_title"/>
    </form-group>
    <form-group for="Headline Text">
      <text-area type="text" placeholder="Enter Headline Text" v-model="form.headline_text" name="headline_text"/>
    </form-group>
    <form-group for="Headline Button">
      <text-input type="text" placeholder="Enter Headline Button Text" v-model="form.headline_button_text" name="headline_button_text"/>
    </form-group>

    <form-group for="About Text">
      <text-area type="text" placeholder="Enter About Text" v-model="form.about_text" name="about_text"/>
    </form-group>
    <form-group for="Footer About">
      <text-area type="text" placeholder="Enter Footer About" v-model="form.footer_about" name="footer_about"/>
    </form-group>
    <primary-button class="mt-4" type="submit">Save</primary-button>
  </form>
</template>

<style scoped>

</style>