<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DashboardContainer from "@/Components/UI/DashboardContainer.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import {reactive, ref} from "vue";
import FormGroup from "@/Components/Form/FormGroup.vue";
import {router} from '@inertiajs/vue3'
import TextArea from "@/Components/Form/TextArea.vue";
import CancelButton from "@/Components/CancelButton.vue";
import {Client} from "@/types/types";

const props = defineProps<{
  clients: Client[];
}>()

const form = reactive({

  name: "",
  client_id: null,
  body: "",
  avatar: "",
});
const errors = ref([]);
const handleSubmit = () => {
  // alert('working');
  router.post(`/admin/testimonials`, {

    name: form.name,
    client_id: form.client_id,
    avatar: form.avatar,
    body: form.body
  });
}


</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Testimonial Create</h2>
    </template>
    <DashboardContainer>
      <h1 class="text-3xl font-bold mb-4">Create Testimonial</h1>

      <div v-if="Object.keys(errors).length > 0" class="bg-gray-50 px-8 py-4 my-4 rounded">
        <h4 class="text-red-500 font-bold">Please Fix Errors and Try Again:</h4>
        <ul class="">
          <li class="text-red-500 list-disc" v-for="error in errors">
            {{ error }}
          </li>
        </ul>
      </div>
      <form @submit.prevent="handleSubmit">
        <form-group for="name">
          <text-input v-model="form.name" name="name"/>
        </form-group>
        <form-group for="client" text="Client">
          <select class="w-full rounded" v-model="form.client_id" placeholder="Client" required>
            <option selected value="" disabled>Select a Client</option>
            <option v-for="client in clients" :key="client.id" :value="client.id">{{ client.name }}</option>
          </select>
        </form-group>
        <form-group for="avatar" text="Avatar">
          <text-input class="w-full rounded-tl-none rounded-bl-none" @input="form.avatar = $event.target.files[0]" name="avatar"
                      type="file"></text-input>
        </form-group>
        <form-group for="Body">
          <text-area rows="15" v-model="form.body" name="body"/>
        </form-group>
        <div class="flex justify-between mt-4">
          <button class=" bg-green-800 text-white rounded py-4 px-6">Save</button>
          <cancel-button @click.prevent="$inertia.visit(route('admin.testimonials.index'))"/>
        </div>

      </form>

    </DashboardContainer>
  </AuthenticatedLayout>
</template>

