<script lang="ts" setup>
import {ref} from "vue";
import gsap from "gsap";
import {Project, ProjectPhoto} from "@/types/project";

const props = defineProps<{
  project: Project;
  backgroundImage: any
}>()
const imageBox = ref([]);

// Function to animate the specific box on hover
const boxAnimation = (isEntering) => {
  if (isEntering) {
    gsap.to(imageBox.value, {duration: .5, css: {transform: 'rotateX(0)'}, ease: 'power3.inOut'});
  } else {
    gsap.to(imageBox.value, {duration: .5, css: {transform: 'rotateX(-90deg)'}, ease: 'power3.inOut'});

  }
}
</script>
<template>


  <div :style="backgroundImage"
       class="w-[370px] h-[426px] p-10 bg-cover bg-center flex items-center justify-center text-white font-bold"
       @mouseenter="boxAnimation( true)"
       @mouseleave="boxAnimation( false)">
    <div class="h-full w-full bg-red-600 flex flex-col items-center justify-center p-10 [transform:rotateX(-90deg)]" ref="imageBox">
      <h4 class="uppercase text-center">{{ project.services[0].title }}</h4>
      <a class="text-3xl font-extrabold text-center" :href="`/view-projects/${project.id}`">{{ project.title }}</a>
    </div>
  </div>

</template>
