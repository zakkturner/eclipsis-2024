<script setup lang="ts">


import {Post, Tag} from "@/types/post";
import {Head} from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import BlogPost from "@/Components/Blog/BlogPost.vue";

const props = defineProps<{
  post: Post,
  tags: Tag[]
}>()
</script>

<template>
  <Head :title="post.title"/>
  <main-layout>
    <blog-post :post="post" :tags="tags"></blog-post>
  </main-layout>
</template>

<style scoped>

</style>