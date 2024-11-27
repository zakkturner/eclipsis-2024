<template>
  <li
      class="rounded-xl uppercase text-[13px] text-[#686a6f] bg-white p-2 mr-2 mb-2 flex flex-wrap items-center font-bold hover:bg-eclipsis-gold hover:text-eclipsis-navy ease-in-out duration-300">

    <a class="w-full h-full p-2 " v-if="props.route == 'index' " :href="`/admin/blog?tag=${tag.id}`">
      {{ tag.name }}
    </a>
    <h5 v-else>
      {{ tag }}
    </h5>
    <slot/>
  </li>
</template>
<script setup lang="ts">

import {Tag} from "@/types/post";


const props = defineProps<{
  tag: Tag,
  route?: string
}>()
</script>