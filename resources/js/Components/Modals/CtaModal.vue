<script setup lang="ts">

import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import FormGroup from "@/Components/Form/FormGroup.vue";
import {router, useForm} from "@inertiajs/vue3";
import {CTA} from "@/types/types";
import {ref} from "vue";

const emit = defineEmits(['formSubmit'])
const form = useForm({
  name: "",
  company: "",
  email: ""
})
const props = defineProps<{
  cta: CTA
}>();
const message = ref(null)
const formSubmitted = ref(false)
const handleSubmit = () => {
  try {
    router.post(`/cta/${props.cta.id}`, {
      company: form.company,
      name: form.name,
      email: form.email,
      lead_source: `CTA: ${props.cta.id}`,
      is_active: true
    }, {
      preserveScroll: true,
      preserveState: true,
      onSuccess: () => {
        formSubmitted.value = true
      }
    });
  } catch (e) {
    message.value = 'Error Submitting Information. Please try again.';
  }
}
</script>

<template>
  <div class="p-6">
    <slot></slot>
    <form v-if="!formSubmitted">
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
    <div class="flex mt-4" v-if="!formSubmitted">
      <primary-button @click="handleSubmit">Submit</primary-button>
      <secondary-button>Cancel</secondary-button>
    </div>
    <div class="pb-8" v-else>
      <h3 class="text-green-600 text-2xl text-center pt-4">{{ $page.props.flash.message }}</h3>
    </div>
  </div>
</template>

<style scoped>

</style>