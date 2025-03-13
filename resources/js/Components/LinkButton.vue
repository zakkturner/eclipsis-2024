<script setup lang="ts">
const props = defineProps<{
  link: string
  bg?: string
}>()
</script>

<template>
  <a :class="bg ? bg : 'bg-eclipsis-gold ' + 'p-6 text-eclipsis-navy text-sm font-semibold rounded'" :href="link">
    <slot/>
  </a>
</template>
