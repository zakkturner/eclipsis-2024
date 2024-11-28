<script setup lang="ts">
const props = defineProps<{
  title?: string;
}>()
</script>

<template>
  <div class="bg-gray-100 p-10 rounded-lg mb-4 p-10">
    <h4 class="uppercase text-black font-bold pb-6">{{ title }}</h4>
    <slot/>
  </div>
</template>

<style scoped>

</style>