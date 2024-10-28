<template>
  <li class="rounded-xl uppercase text-[12px] p-4 bg-white p-2 mr-2 mb-2 flex items-center">

    <a :href="`/admin/blog?tag=${tag.id}`">
      {{ tag.name }}
    </a>
    <slot/>
  </li>
</template>
<script setup lang="ts">

import {Tag} from "@/types/post";

const props = defineProps<{
  tag: Tag
}>()
</script>