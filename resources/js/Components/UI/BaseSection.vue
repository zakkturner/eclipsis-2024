<script setup lang="ts">

import {computed} from "vue";

const props = defineProps<{
  color?: string
  padding?: string
}>()

const bgColor = computed(() => {
  switch (props.color) {
    case 'blue':
      return 'bg-eclipsis-navy'
      break;
    case 'gray':
      return 'bg-gray-100'
      break;
    default:
      return 'bg-white'

  }
})
const padding = computed(() => {
  switch (props.padding) {
    case 'sm':
      return '10'
      break
    case 'md':
      return '20'
    case 'lg':
      return '32'
    default:
      return '0'
  }
})
</script>


<template>
  <section :class="`py-${padding} ${bgColor}`">
    <slot name="title"/>
    <div class="max-w-[90%] xl:max-w-6xl mx-auto py-20">
      <slot/>
    </div>
  </section>
</template>

<style scoped>

</style>