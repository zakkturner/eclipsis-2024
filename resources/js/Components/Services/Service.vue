<script setup lang="ts">


import Services from "@/Components/Services/Services.vue";
import {Service} from "@/types/types";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import OhVueIcon from "oh-vue-icons";
import gsap from 'gsap';
import {ref} from "vue";

const props = defineProps<{
  service: Service
}>()
const serviceItem = ref(null);
const serviceText = ref(null);
const handleAnimation = (enter = true) => {
  if (enter) {
    gsap.to(serviceItem.value, {css: {background: "#193153"}});
    gsap.to(serviceText.value, {css: {color: "#cea434"}});
  } else {
    gsap.to(serviceItem.value, {css: {background: "#d1d5db"}});
    gsap.to(serviceText.value, {css: {color: "#00000080"}});

  }
}
</script>

<template>
  <li ref="serviceItem" @mouseenter="handleAnimation" @mouseleave="handleAnimation(false)"
      class="bg-gray-300 p-20 w-full  flex  items-center ">
    <font-awesome-icon class="mr-4 text-eclipsis-gold text-4xl" :icon="['fas', service.icon]"></font-awesome-icon>
    <h4 ref="serviceText" class="text-xl font-black text-center md:text-left text-[#00000080]">{{ service.title }}</h4>
  </li>
</template>

<style scoped>

</style>