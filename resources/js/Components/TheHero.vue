<script setup lang="ts">

import LinkButton from "@/Components/LinkButton.vue";

const props = defineProps<{
  site_content: any
}>();
</script>

<template>
  <section
      class="
    h-screen
     bg-no-repeat
     bg-cover
     bg-center
"
      :class="
   ` bg-[url(${site_content?.headline_image ?? `'/images/code.jpg'` })]`

"
  >
    <div class="flex justify-center h-full items-center bg-gradient-to-b from-10% from-eclipsis-navy to-transparent">
      <div class="text-center px-2 max-w-[90%] md:max-w-6xl mx-auto">
        <div class="mb-8">
          <h1 class="text-white text-4xl lg:text-6xl font-bold">
            {{ props.site_content?.headline_title ?? 'Eclipse Your Goals' }}</h1>
        </div>
        <div class="mb-8">
          <p class="text-lg font-semibold text-gray-100 lg:text-4xl">
            {{
              props.site_content?.headline_text ??
              " We deliver high quality solutions for your technical needs. Let us handle the technical side so you can get back to business!"
            }}
          </p>
        </div>
        <div>
          <link-button link="#contact">{{ props.site_content?.headline_button_text ?? 'Contact Us' }}</link-button>
        </div>
      </div>
    </div>
  </section>
</template>