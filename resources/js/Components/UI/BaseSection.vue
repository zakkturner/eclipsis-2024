<script setup lang="ts">

import {computed} from "vue";

const props = defineProps<{
  color?: string
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

</script>


<template>
  <section :class="`py-20 ${bgColor}`">
    <slot name="title"/>
    <div class="max-w-[90%] xl:max-w-6xl mx-auto py-20">
      <slot/>
    </div>
  </section>
</template>

<style scoped>

</style>