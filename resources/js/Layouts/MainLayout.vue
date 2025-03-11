<script setup lang="ts">

import MobileMenu from "@/Components/MobileMenu.vue";
import TheHeader from "@/Components/Header/TheHeader.vue";
import {Announcement} from "@/types/types";
import {nextTick, onMounted, ref, watch} from "vue";
import gsap from "gsap";
import {useUiStateStore} from "@/store";
import TheHero from "@/Components/TheHero.vue";
import {ScrollTrigger} from "gsap/ScrollTrigger";
import {faBars} from "@fortawesome/free-solid-svg-icons";
import NavLink from "@/Components/NavLink.vue";
import TheLogo from "@/Components/TheLogo.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import FixedHeader from "@/Components/Header/FixedHeader.vue";

gsap.registerPlugin(ScrollTrigger);
const props = defineProps<{
  announcement?: Announcement
}>();
const uiStore = useUiStateStore();
const main = ref(null);
const headerStatic = ref<HTMLElement | null>(null);
const headerFixed = ref<HTMLElement | null>(null);

onMounted(() => {
  console.log(headerFixed.value);

  nextTick(() => {
    ScrollTrigger.refresh();

    const mm = gsap.matchMedia();

    mm.add("(min-width: 1024px)", () => {
      gsap.fromTo("#headerFixed", {y: 0, opacity: 0}, {
        y: 80,
        opacity: 1,
        scrollTrigger: {
          trigger: "#staticHeader",
          start: "top top",
          end: "bottom -20%",
          scrub: true,
          // markers: true
        },
        ease: "slow(0.7,0.7,false)"
      });
    });

    mm.add("(max-width: 1023px)", () => {
      gsap.fromTo("#headerFixed", {y: 0, opacity: 0}, {
        y: 150,
        opacity: 1,
        scrollTrigger: {
          trigger: "#staticHeader",
          start: "top top",
          end: "bottom -20%",
          scrub: true,
          markers: true
        },
        ease: "slow(0.7,0.7,false)"
      });
    });
  });
});
watch(
    () => uiStore.isMenuOpen,
    (newVal) => {
      if (newVal) {

        gsap.to(main.value, {
          x: 0, opacity: 0, y: 250, duration: 0.5, ease: 'power2.out', onComplete: () => {
            gsap.set(main.value, {clearProps: "transform"}); // Removes inline transform styles
          },
        });
      } else {
        gsap.to(main.value, {
          x: 0, y: 0, opacity: 1, duration: 0.5, ease: 'power2.in', delay: 1, onComplete: () => {
            gsap.set(main.value, {clearProps: "transform"}); // Removes inline transform styles
          },
        });
      }
    },
    {immediate: true}
);
const refreshScroll = () => {
  alert('refresh')
  ScrollTrigger.refresh();
}
</script>

<template>
  <div ref="wrapper" class="relative h-screen scroll-smooth" :class="uiStore.isMenuOpen == true? 'overflow-hidden' : ''">
    <mobile-menu @menu-clicked="refreshScroll"></mobile-menu>
    <main ref="main" class="scroll-smooth bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 absolute z-50 top-0 left-0 w-full h-fit ">
      <TheHeader id="staticHeader" ref="headerStatic" :announcement="announcement"></TheHeader>
      <FixedHeader id="headerFixed"></FixedHeader>
      <slot name="hero"></slot>
      <slot/>
    </main>
  </div>
</template>

<style scoped>

</style>