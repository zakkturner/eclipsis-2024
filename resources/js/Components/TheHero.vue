<script setup lang="ts">

import LinkButton from "@/Components/LinkButton.vue";
</script>

<template>
  <section
      class="
    h-screen
    bg-[url('/images/code.jpg')]
     bg-no-repeat
     bg-cover
     bg-center
">
    <div class="flex justify-center h-full items-center bg-gradient-to-b from-10% from-eclipsis-navy to-transparent">
      <div class="text-center px-2 max-w-[90%] md:max-w-6xl mx-auto">
        <div class="mb-8">
          <h1 class="text-white text-4xl lg:text-6xl font-bold">Eclipse Your Goals</h1>
        </div>
        <div class="mb-8">
          <p class="text-lg font-semibold text-gray-100 lg:text-4xl">
            We deliver high quality solutions for your technical needs. Let us handle the technical side so you can get back to business!
          </p>
        </div>
        <div>
          <link-button link="#contact">Contact Us</link-button>
        </div>
      </div>
    </div>
  </section>
</template>