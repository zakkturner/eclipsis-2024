<template>
  <aside class="w-2/6">
    <div class="relative">
      <search-form></search-form>
    </div>
    <gray-card title="Latest Post">
      <ul class="flex flex-col">
        <li v-for="new_post in latest_posts" class="flex items-center mb-4">
          <img v-if="new_post.thumbnail" :src="`/storage/${new_post.thumbnail}`" class="w-16 h-16 rounded-full mr-4"/>
          <img v-else src="/images/no-image.jpg" class="w-16 h-16 rounded-full mr-4"/>
          <a :href="`/blog/${new_post.slug}`" class="uppercase font-semibold text-sm text-eclipsis-navy">{{ new_post.title }}</a>
        </li>
      </ul>
    </gray-card>
    <gray-card title="Tags">
      <ul class="flex flex-wrap">

        <base-tag v-for="tag in tags" :tag="tag" :indexRoute="true"></base-tag>
      </ul>
    </gray-card>
  </aside>
</template>
<script setup lang="ts">
import {Post, Tag} from "@/types/post";
import BaseTag from "@/Components/UI/BaseTag.vue";
import GrayCard from "@/Components/UI/GrayCard.vue";
import SearchForm from "@/Components/Blog/SearchForm.vue";

const props = defineProps<{
  latest_posts?: Post[],
  tags?: Tag[],
}>()
</script>