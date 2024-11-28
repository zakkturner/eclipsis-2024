<script setup lang="ts">

import {Tag} from "@/types/post";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";


const props = defineProps<{
  tag: Tag,
  indexRoute?: boolean
}>()
const linkUrl = computed(() => {
  return route().current() == 'blog.show' || route().current() == 'blog.index' || route().current() == 'blog.tag' ? `/blog/tag/${props.tag.name}` :
      `/admin/blog?tag=${props.tag.id}`
})
</script>
<template>

  <li
      class="rounded-xl uppercase text-[13px] text-[#686a6f] bg-white p-2 mr-2 mb-2 flex flex-wrap items-center font-bold hover:bg-eclipsis-gold hover:text-eclipsis-navy ease-in-out duration-300">
    <a class="w-full h-full p-2 " v-if="indexRoute" :href="linkUrl">
      {{ tag.name }}
    </a>
    <h5 v-else>
      {{ tag }}
    </h5>
    <slot/>
  </li>
</template>
