<script setup lang="ts">


import {Category, Post, Tag} from "@/types/post";
import {Head} from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import BlogPost from "@/Components/Blog/BlogPost.vue";

const props = defineProps<{
  post: Post,
  tags: Tag[],
  categories: Category[],
  latest_posts: Post[]
}>()
</script>

<template>
  <Head :title="post.title"/>
  <main-layout>
    <section class="w-3/4 mt-40 mx-auto">

      <blog-post :post="post" :latest_posts="latest_posts" :categories="categories" :tags="tags"></blog-post>
    </section>

  </main-layout>
</template>

<style scoped>

</style>