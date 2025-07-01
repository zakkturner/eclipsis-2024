<script setup lang="ts">

import Form from "@/Components/Form/Form.vue";
import FormGroup from "@/Components/Form/FormGroup.vue";
import TextArea from "@/Components/Form/TextArea.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {router, useForm} from "@inertiajs/vue3";

const props = defineProps<{
  company_info: any;
  site_content: any;
}>()
const form = useForm({
  name: props.company_info?.name || "",
  phone: props.company_info?.phone || "",
  email: props.company_info?.email || "",
  facebook_url: props.company_info?.facebook_url || "",
  instagram_url: props.company_info?.instagram_url || "",
  twitter_url: props.company_info?.twitter_url || "",
  youtube_url: props.company_info?.youtube_url || ""

});

const handleSubmit = async () => {
 
  try {

    await router.post('/admin/company-info', form);
  } catch (error) {
    console.log(error)
  }
}
</script>

<template>
  <h4 class="font-bold mb-4 text-lg">General Settings</h4>
  <form @submit.prevent="handleSubmit">
    <form-group for="Company Name">
      <text-input type="text" placeholder="Enter Company Name" v-model="form.name" name="name"/>
    </form-group>
    <form-group for="Company Phone">
      <text-input type="text" placeholder="Enter Company Phone" v-model="form.phone" name="phone"/>
    </form-group>
    <form-group for="Company Email">
      <text-input type="text" placeholder="Enter Company Email" v-model="form.email" name="email"/>
    </form-group>
    <form-group for="Company Facebook">
      <text-input type="text" placeholder="Enter Company Facebook" v-model="form.facebook_url" name="name"/>
    </form-group>
    <form-group for="Company Twitter">
      <text-input type="text" placeholder="Enter Company Twitter" v-model="form.twitter_url" name="twitter"/>
    </form-group>
    <form-group for="Company Youtube">
      <text-input type="text" placeholder="Enter Company Youtube" v-model="form.youtube_url" name="youtube"/>
    </form-group>
    <form-group for="Company Instagram">
      <text-input type="text" placeholder="Enter Company Instagram" v-model="form.instagram_url" name="instagram"/>
    </form-group>

    <primary-button class="mt-4" type="submit">Save</primary-button>
  </form>
</template>

<style scoped>

</style>