<script setup lang="ts">
import {CTA} from "@/types/types";
import BaseSection from "@/Components/UI/BaseSection.vue";

const props = defineProps<{
  cta: CTA
}>()
</script>

<template>
  <base-section :color="cta.background_color">
    <h1>{{ cta.title }}</h1>
  </base-section>
</template>

<style scoped>

</style>