<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DashboardContainer from "@/Components/UI/DashboardContainer.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import {reactive, ref} from "vue";
import FormGroup from "@/Components/Form/FormGroup.vue";
import {router} from '@inertiajs/vue3'
import TextArea from "@/Components/Form/TextArea.vue";
import CancelButton from "@/Components/CancelButton.vue";

const form = reactive({
  company: "",
  name: "",
  email: "",
  website_url: "",
  budget: "",
  phone: "",
  address: "",
  owner_birthday: "",
  twitter: "",
  linkedin: "",
  instagram: "",
  notes: "",
});
const errors = ref([]);
const handleSubmit = () => {
  // alert('working');
  router.post(`/admin/clients`, {

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
    notes: form.notes
  });
}


</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clients Create</h2>
    </template>
    <DashboardContainer>
      <h1 class="text-3xl font-bold mb-4">Create Client</h1>

      <div v-if="Object.keys(errors).length > 0" class="bg-gray-50 px-8 py-4 my-4 rounded">
        <h4 class="text-red-500 font-bold">Please Fix Errors and Try Again:</h4>
        <ul class="">
          <li class="text-red-500 list-disc" v-for="error in errors">
            {{ error }}
          </li>
        </ul>
      </div>
      <form @submit.prevent="handleSubmit">
        <form-group text="Company" for="company">
          <text-input v-model="form.company" name="company"/>
        </form-group>
        <form-group for="name">
          <text-input v-model="form.name" name="name"/>
        </form-group>

        <form-group for="email" text="Email">
          <input type="text" v-model="form.email">
        </form-group>
        <form-group for="website_url" text="Website Url">
          <text-input v-model="form.website_url"></text-input>
        </form-group>
        <form-group for="budget" text="Budget">
          <select class="w-full rounded" v-model="form.budget" placeholder="Budget" required>
            <option selected value="" disabled>Select a Budget</option>
            <option selected value="$0-1000">$0-1500</option>
            <option selected value="$0-1000">$1500-3000</option>
            <option selected value="$0-1000">$3000-5000</option>
            <option selected value="$0-1000">$5000-10000</option>
            <option selected value="$0-1000">$10000+</option>
          </select>
        </form-group>

        <form-group for="owner_birthday" text="Owner Birthday">
          <text-input type="date" v-model="form.owner_birthday" name="owner_birthday"></text-input>
        </form-group>
        <form-group :socials="true" for="twitter" text="Twitter">

          <text-input class="w-full rounded-tl-none rounded-bl-none" v-model="form.twitter" name="twitter"></text-input>

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
        <div class="flex justify-between">
          <button class="mt-4 bg-green-800 text-white rounded py-4 px-6">Save</button>
          <cancel-button @click.prevent="$inertia.visit(route('admin.clients.index'))"/>
        </div>

      </form>

    </DashboardContainer>
  </AuthenticatedLayout>
</template>

