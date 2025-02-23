<script setup lang="ts">

import {useServicesStore} from "@/store/services";
import Service from "@/Components/Services/Service.vue";

const serviceStore = useServicesStore();
const services = serviceStore.services;
</script>

<template>
  <ul class=" px-12 xl:px-0 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4 ">
    <service v-for="service in services" :key="service.id" :service="service"></service>
  </ul>
</template>

<style scoped>

</style>