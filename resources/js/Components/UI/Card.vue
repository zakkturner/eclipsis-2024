<script setup lang="ts">
const props = defineProps<{
  title?: string;
}>()
</script>

<template>
  <div class=" p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <slot name="icon"></slot>
    <a href="#">
      <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{title}}</h5>
    </a>
      <slot></slot>
  </div>
</template>

<style scoped>

</style>