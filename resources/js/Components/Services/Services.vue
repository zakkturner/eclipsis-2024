<script setup lang="ts">


import ServiceList from "@/Components/Services/ServiceList.vue";
import SectionTitle from "@/Components/UI/SectionTitle.vue";
import BaseSection from "@/Components/UI/BaseSection.vue";
</script>

<template>
  <base-section padding="md">
    <section-title subtitle="Our Services" title="View Services We Provide"></section-title>
    <div class="max-w-[90%] md:max-w-6xl mx-auto my-20">
      <service-list></service-list>
    </div>
  </base-section>
</template>

<style scoped>

</style>