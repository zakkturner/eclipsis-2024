<script setup lang="ts">

import {Testimonial} from "@/types/types";
import TestimonialItem from "./TestimonialItem.vue"

const props = defineProps<{
  testimonials: Testimonial[]
}>()
</script>

<template>
  <section class="bg-gray-100">
    <div class="max-w-[90%] xl:max-w-6xl mx-auto py-20">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        <testimonial-item v-for="testimonial in testimonials" :testimonial="testimonial" :key="testimonial.id"></testimonial-item>
      </div>
      <!--      <service-list></service-list>-->
    </div>
  </section>
</template>

<style scoped>

</style>