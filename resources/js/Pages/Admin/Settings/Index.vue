<script setup lang="ts">

import {Head, router, useForm, usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Card from "@/Components/UI/Card.vue";
import Form from "@/Components/Form/Form.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import FormGroup from "@/Components/Form/FormGroup.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
import {ref} from "vue";

const props = defineProps<{
  company_info: any
}>()
const {flash}: any = usePage().props;

const form = useForm({
  name: props.company_info.name || "",
  phone: props.company_info.phone || "",
  email: props.company_info.email || "",
  facebook_url: props.company_info.facebook_url || "",
  instagram_url: props.company_info.instagram_url || "",
  twitter_url: props.company_info.twitter_url || "",
  youtube_url: props.company_info.youtube_url || "",

});

const handleSubmit = () => {

  router.post('/admin/company-info', form);
}
</script>

<template>
  <Head title="Settings"/>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Settings</h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <card>
          <div class="mb-6">
            <ul>
              <li>
                <button class="border-b">Company Settings</button>
              </li>
            </ul>
          </div>
          <div>
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
          </div>
        </card>
        <flash-message :message="flash.message"></flash-message>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>