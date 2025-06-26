<script setup lang="ts">
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage();

const options = computed(() => {
  return page.url.includes('cta')
      ? [
        {value: 'left', label: 'Left'},
        {value: 'right', label: 'Right'},
        {value: 'center', label: 'Center'},
      ]
      : [
        {value: 'featured', label: 'Featured'},
        {value: 'first', label: 'First'},
        {value: 'second', label: 'Second'},
        {value: 'third', label: 'Third'},
      ];
});
</script>

<template>
  <option v-for="opt in options" :key="opt.value" :value="opt.value">
    {{ opt.label }}
  </option>
</template>

<style scoped>

</style>