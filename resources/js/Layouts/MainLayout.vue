<script setup lang="ts">

import MobileMenu from "@/Components/MobileMenu.vue";
import TheHeader from "@/Components/TheHeader.vue";
import {Announcement} from "@/types/types";
import {ref, watch} from "vue";
import gsap from "gsap";
import {useUiStateStore} from "@/store";
import TheHero from "@/Components/TheHero.vue";

const props = defineProps<{
  announcement?: Announcement
}>();
const uiStore = useUiStateStore();
const main = ref(null);
watch(
    () => uiStore.isMenuOpen,
    (newVal) => {
      if (newVal) {

        gsap.to(main.value, {x: 0, opacity: 0, y: 250, duration: 0.5, ease: 'power2.out'});
      } else {
        gsap.to(main.value, {x: 0, y: 0, opacity: 1, duration: 0.5, ease: 'power2.in', delay: 1});
      }
    },
    {immediate: true}
);
</script>

<template>
  <div ref="wrapper" class="relative h-screen " :class="uiStore.isMenuOpen == true? 'overflow-hidden' : ''">
    <mobile-menu></mobile-menu>
    <main ref="main" class="scroll-smooth bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 absolute z-50 top-0 left-0 w-full h-fit ">
      <TheHeader :announcement="announcement"></TheHeader>
      <slot name="hero"></slot>
      <slot/>
    </main>
  </div>
</template>

<style scoped>

</style>