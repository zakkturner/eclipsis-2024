<script lang="ts" setup>
import {ProjectPhoto} from "@/types/project";

const props = defineProps<{
  caseStudy?: Object,
  photos: Object
}>();
</script>

<template>
  <div class=" flex flex-col gap-y-20">
    <div class="grid grid-cols-2 gap-x-20 items-center">
      <div class="">
        <h3 class="uppercase text-4xl font-extrabold mb-10">Problem</h3>
        <p class="leading-8">
          {{ caseStudy.problem }}
        </p>
      </div>
      <div class="rounded-lg overflow-hidden">
        <img :src="`/storage/${photos.first.img_src}`"/>
      </div>
    </div>
    <div class="grid grid-cols-2 gap-x-20 items-center">
      <div class="">
        <h3 class="uppercase text-4xl font-extrabold mb-10">Solution</h3>
        <p class="leading-8">
          {{ caseStudy.solution }}
        </p>
      </div>
      <div class="rounded-lg overflow-hidden">
        <img :src="`/storage/${photos.second.img_src}`"/>
      </div>
    </div>
    <div class="grid grid-cols-2 gap-x-20 items-center">
      <div class="">
        <h3 class="uppercase text-4xl font-extrabold mb-10">Result</h3>
        <p class="leading-8">
          {{ caseStudy.result }}

        </p>
      </div>
      <div class="rounded-lg overflow-hidden">
        <img :src="`/storage/${photos.third.img_src}`"/>
      </div>
    </div>
  </div>
</template>
