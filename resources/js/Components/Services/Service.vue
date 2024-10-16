<script setup lang="ts">


import Services from "@/Components/Services/Services.vue";
import {Service} from "@/types/types";

const props = defineProps<{
  service: Service
}>()
</script>

<template>
  <li class="bg-gray-300 p-20" >{{ service.title }}</li>
</template>

<style scoped>

</style>