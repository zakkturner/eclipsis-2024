<script setup lang="ts">
import {CTA} from "@/types/types";
import BaseSection from "@/Components/UI/BaseSection.vue";
import {computed, ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Modal from "@/Components/Modal.vue";
import CtaModal from "@/Components/Modals/CtaModal.vue";
import {router} from "@inertiajs/vue3";

const props = defineProps<{
  cta: CTA
}>()
const isOpen = ref(false);
const formSubmitted = ref(false)
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
const handleClick = () => {
  router.post(`/cta/${props.cta.id}/click`, {}, {
    preserveScroll: true,
    preserveState: true,
    onSuccess: () => {
      isOpen.value = true
    }
  });
}
</script>

<template>
  <base-section :color="cta.background_color">

    <div class="flex  justify-between"
         :class="ctaImg.position == 'center' ? 'flex-col text-center' : 'items-center'">
      <div class="text-white">
        <div class="">
          <h2 class="  text-6xl font-bold" :class="cta.background_color == 'blue' ? 'text-eclipsis-gold' : ''">{{ cta.title }}</h2>
          <p class="text-2xl">{{ cta.subtitle }}</p>
        </div>
        <div class="my-4 ">
          <p>{{ cta.body }}</p>
        </div>
        <div :class="ctaImg.position == 'center' ? 'mb-8' : ''">
          <secondary-button @click.prevent="handleClick">{{ cta.button_text }}</secondary-button>
        </div>
      </div>
      <img :class="imgOrder" :src="`/storage/${ctaImg.img_src}`" :alt="`${ctaImg.alt}`"/>
    </div>
    <modal centered :show="isOpen">
      <cta-modal :cta="cta" @form-submit="formSubmitted = true">
        <div class="flex justify-end">
          <button @click="isOpen = false">X</button>
        </div>
        <h3 class="font-black text-2xl">{{ cta.body }}</h3>
      </cta-modal>
    </modal>
  </base-section>
</template>

<style scoped>

</style>