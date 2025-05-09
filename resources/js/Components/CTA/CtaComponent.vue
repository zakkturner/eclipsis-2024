<script setup lang="ts">
import {CTA} from "@/types/types";
import BaseSection from "@/Components/UI/BaseSection.vue";
import {computed} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps<{
  cta: CTA
}>()
const ctaImg = props.cta.photos[0] ?? null;
const imgOrder = computed(() => {
  switch (ctaImg.position) {
    case 'left':
      return '-order-1'
      break;
    case 'center':
      return 'order-1'
      break;
    case 'right':
      return 'order-2'
      break;
  }
})
</script>

<template>
  <base-section :color="cta.background_color">
    <div class="flex  justify-between"
         :class="ctaImg.position == 'center' ? 'flex-col text-center' : 'items-center'">
      <div class="text-white">
        <div class="">
          <h2 class="text-white text-4xl">{{ cta.title }}</h2>
          <p class="text-2xl">{{ cta.subtitle }}</p>
        </div>
        <div class="my-4">
          <p>{{ cta.body }}</p>
        </div>
        <div>
          <secondary-button>{{ cta.button_text }}</secondary-button>
        </div>
      </div>
      <img :class="imgOrder" :src="`/storage/${ctaImg.img_src}`">
    </div>

  </base-section>
</template>

<style scoped>

</style>