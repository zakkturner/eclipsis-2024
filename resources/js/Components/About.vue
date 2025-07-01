<script setup lang="ts">

import TheLogo from "@/Components/TheLogo.vue";
import BaseSection from "@/Components/UI/BaseSection.vue";

const props = defineProps<{
  about_text: string;

}>()
</script>

<template>
  <base-section padding="md">
    <div class="flex item flex-col max-w-[90%] xl:max-w-6xl mx-auto py-20 items-center lg:flex-row">
      <div class="px-12 md:px-0 lg:pr-24 lg:w-4/6 text-center lg:text-left mb-10">
        <h2 class="text-6xl mb-4 text-eclipsis-navy font-extrabold">About Eclipsis Studios<span class="text-eclipsis-gold">.</span></h2>
        <p class="leading-8 font-bold text-gray-500" v-html="about_text" v-if="about_text"></p>
        <p v-if="!about_text" class="leading-8 mb-4 font-bold text-gray-500">At Eclipsis Studios, we are dedicated to helping small business owners
          thrive in
          today's
          digital
          age. Our
          team of
          experts
          specializes in
          web
          development and design, providing solutions tailored to each client's unique problems. We understand that your time is valuable, let us take
          the technical load off of your shoulders.Whether you need a simple brochure site to showcase your services, an application to track leads,
          or a robust eCommerce platform, our team has the expertise to bring your vision to life. </p>
        <p v-if="!about_text" class="leading-8 font-bold text-gray-500">At Eclipsis Studios, we are committed to exceeding our clients' expectations
          and delivering
          exceptional value.
          Let us
          help you eclipse
          your
          competition and achieve your business goals.
        </p>

      </div>
      <div class="lg:w-2/6">
        <img class="w-full" src="/images/logos/cropped-eclipsis-yellow.png" alt="Eclipsis Studios | Software Agency"
             title="Eclipsis Studios | Software Agency"/>
      </div>
    </div>
  </base-section>

</template>

<style scoped>

</style>