<script setup lang="ts">

import {useServicesStore} from "@/store/services";
import Service from "@/Components/Services/Service.vue";

const serviceStore = useServicesStore();
const services = serviceStore.services;
</script>

<template>

  <h2 class="text-center text-6xl mb-4">Our Services</h2>
  <ul class="flex justify-between">
    <service v-for="service in services" :key="service.id" :service="service"></service>
  </ul>
</template>

<style scoped>

</style>