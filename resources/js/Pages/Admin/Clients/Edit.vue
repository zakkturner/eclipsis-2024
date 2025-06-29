<script setup lang="ts">

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


  client: Client,
  errors: any
}>()
const form = reactive({
  company: props.client.company,
  name: props.client.name,
  email: props.client.email,
  website_url: props.client.website_url,
  budget: props.client.budget,
  phone: props.client.phone,
  address: props.client.address,
  owner_birthday: props.client.owner_birthday,
  twitter: props.client.twitter,
  linkedin: props.client.linkedin,
  instagram: props.client.instagram,
  status: props.client.status,
  notes: props.client.notes,
  is_active: props.client.is_active,
  lead_source: props.client.lead_source
});

const handleSubmit = () => {
  // alert('working');
  router.post(`/admin/clients/${props.client.id}`, {
    _method: 'put',
    company: form.company,
    name: form.name,
    email: form.email,
    website_url: form.website_url,
    budget: form.budget,
    phone: form.phone,
    address: form.address,
    owner_birthday: form.owner_birthday,
    twitter: form.twitter,
    linkedin: form.linkedin,
    instagram: form.instagram,
    notes: form.notes,
    status: form.status,
    source: form.lead_source,
    is_active: form.is_active
  });
}
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clients Edit</h2>
    </template>
    <DashboardContainer>
      <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold mb-4">{{ client.company }} </h1>
        <span v-if="client.is_active" class="text-green-600 ">Active</span>
        <span v-else class="text-gray-600">Inactive</span>

      </div>
      <div v-if="Object.keys(errors).length > 0" class="bg-gray-50 px-8 py-4 my-4 rounded">
        <h4 class="text-red-500 font-bold">Please Fix Errors and Try Again:</h4>
        <ul class="">
          <li class="text-red-500 list-disc" v-for="error in errors">
            {{ error }}
          </li>
        </ul>
      </div>
      <form @submit.prevent="handleSubmit">
        <form-group text="client company" for="company">
          <text-input v-model="form.company" name="company"/>
        </form-group>
        <form-group for="name">
          <text-input v-model="form.name" name="name"/>
        </form-group>

        <form-group for="email" text="Email">
          <text-input type="text" v-model="form.email" name="email"/>
        </form-group>
        <form-group for="website_url" text="Website Url">
          <text-input v-model="form.website_url"></text-input>
        </form-group>
        <form-group for="address" text="Address">
          <text-input v-model="form.address"></text-input>
        </form-group>
        <form-group for="budget" text="Budget">
          <div class="flex items-center">
            <span class="px-4 py-2 bg-gray-100 text-center rounded-tl rounded-bl border h-full border-gray-300 border-r-0">$</span>
            <text-input class="w-full rounded-tl-none rounded-bl-none" v-model="form.budget"></text-input>
          </div>
        </form-group>
        <form-group for="website_url" text="Website Url">
          <text-input v-model="form.website_url"></text-input>
        </form-group>
        <form-group for="owner_birthday" text="Owner Birthday">
          <text-input type="date" v-model="form.owner_birthday" name="owner_birthday"></text-input>
        </form-group>
        <form-group :socials="true" for="twitter" text="Twitter">
          <text-input class="w-full rounded-tl-none rounded-bl-none" v-model="form.twitter" name="twitter"></text-input>
        </form-group>
        <form-group for="is active">
          <select class="w-full rounded  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" v-model="form.is_active"
                  id="status">
            <option disabled value="">Active?</option>
            <option :value="true">Yes</option>
            <option :value="false">No</option>
          </select>
        </form-group>
        <form-group for="status">
          <select class="w-full rounded  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" v-model="form.status"
                  id="status">
            <option disabled value="">Select a Status</option>
            <option value="lead">Lead</option>
            <option value="prospect">Prospect</option>
            <option value="negotiation">Negotiation</option>
            <option value="customer">Customer</option>
            <option value="inactive">Inactive</option>
            <option value="lost">Lost</option>
          </select>
        </form-group>
        <form-group :socials="true" for="instagram" text="Instagram">

          <text-input class="w-full rounded-tl-none rounded-bl-none" v-model="form.instagram" name="instagram"></text-input>
        </form-group>
        <form-group :socials="true" for="linkedin" text="Linkedin">
          <text-input class="w-full rounded-tl-none rounded-bl-none" v-model="form.linkedin" name="linkedin"></text-input>
        </form-group>
        <form-group for="Notes">
          <text-area rows="15" v-model="form.notes" name="notes"/>
        </form-group>
        <button class="mt-4 bg-green-800 text-white rounded py-4 px-6">Save</button>
      </form>

    </DashboardContainer>
  </AuthenticatedLayout>
</template>

