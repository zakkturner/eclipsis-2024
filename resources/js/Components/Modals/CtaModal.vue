<script setup lang="ts">

import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import FormGroup from "@/Components/Form/FormGroup.vue";
import {useForm} from "@inertiajs/vue3";

const form = useForm({
  name: "",
  company: "",
  email: ""
})
</script>

<template>
  <div class="p-6">
    <slot></slot>
    <form>
      <form-group for="Name" required>
        <text-input type="text" required v-model="form.name"/>
      </form-group>
      <form-group for="Company Name">
        <text-input type="text" v-model="form.company"/>
      </form-group>
      <form-group for="Email">
        <text-input type="text" v-model="form.email"/>
      </form-group>
    </form>
    <div class="flex mt-4">
      <primary-button>Submit</primary-button>
      <secondary-button>Cancel</secondary-button>
    </div>
  </div>
</template>

<style scoped>

</style>