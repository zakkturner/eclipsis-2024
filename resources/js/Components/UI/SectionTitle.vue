<template>
  <div class="text-center mb-12">
    <h4 class="text-lg text-eclipsis-gold">{{ subtitle }}</h4>
    <h2 class="text-6xl font-bold text-black">{{ title }}</h2>
  </div>
</template>
<script lang="ts" setup>
const props = defineProps<{
  title: string,
  subtitle?: string,
}>()
</script>