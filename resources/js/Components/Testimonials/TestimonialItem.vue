<script setup lang="ts">
import {Testimonial} from "@/types/types";
import gsap from 'gsap';
import {ref} from "vue";

const props = defineProps<{
  testimonial: Testimonial
}>()
const testimonialBox = ref(null);
const testimonialBody = ref(null);
const arrow = ref(null);
const handleAnimation = (enter = false) => {
  if (enter) {
    gsap.to(testimonialBox.value, {duration: .5, x: 200, css: {background: '#193153'}, ease: "power3.inOut"})
    gsap.to(arrow.value, {duration: .5, x: 200, css: {background: '#193153'}, ease: "power3.inOut"})
    gsap.to(testimonialBody.value, {duration: .5, x: 200, css: {color: 'white'}, ease: "power3.inOut"})


  } else {
    gsap.to(testimonialBox.value, {duration: .5, x: 200, css: {background: 'white'}, ease: "power3.inOut"})
    gsap.to(arrow.value, {duration: .5, x: 200, css: {background: 'white'}, ease: "power3.inOut"})

    gsap.to(testimonialBody.value, {duration: .5, x: 200, css: {color: 'rgb(0 0 0 / 0.5)'}, ease: "power3.inOut"})

  }
}
</script>

<template>
  <div class="px-2 flex flex-col items-center mb-10">
    <div ref="testimonialBox" @mouseenter="handleAnimation(true)" @mouseleave="handleAnimation(false)"
         class="bg-white w-full h-[268px] flex justify-center items-center">
      <p ref="testimonialBody" class="text-center max-w-[252px] mx-auto">
        {{ testimonial.body }}
      </p>
    </div>
    <div class="mb-4 ">
      <!--      <img class="w-[78px] h-[20px]" ref="arrow" src="/images/testi-arrow-hover.png">-->
      <div ref="arrow" class="bg-white rotate-45 w-10 h-10 -translate-y-3/4"></div>
    </div>
    <div class="rounded-full overflow-hidden w-[60px] h-[60px]">
      <img class="w-full object-cover h-full" :src="`storage/${testimonial.avatar}`"
           :alt="`Positive client feedback: ${testimonial.client.name} shares their success story with Eclipsis Studio's software solutions.`">
    </div>
    <div class="text-center">
      <h3 class="text-lg font-bold">{{ testimonial.client.name }}</h3>
      <h5 class="text-eclipsis-gold uppercase text-sm">{{ testimonial.client.company }}</h5>
    </div>
  </div>
</template>

<style scoped>

</style>