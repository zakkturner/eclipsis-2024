<script setup lang="ts">

import {Testimonial} from "@/types/types";
import TestimonialItem from "./TestimonialItem.vue"
import BaseSection from "@/Components/UI/BaseSection.vue";

const props = defineProps<{
  testimonials: Testimonial[]
}>()
</script>

<template>
  <base-section color="gray">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      <testimonial-item v-for="testimonial in testimonials" :testimonial="testimonial" :key="testimonial.id"></testimonial-item>
    </div>
  </base-section>
</template>

<style scoped>

</style>