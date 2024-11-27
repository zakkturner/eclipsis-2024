<script setup lang="ts">

import BlogPost from "@/Components/Blog/BlogPost.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import TheHero from "@/Components/TheHero.vue";
import SubPageHero from "@/Components/UI/SubPageHero.vue";
import {computed} from "vue";
import BlogSidebar from "@/Components/Blog/BlogSidebar.vue";
import NavLink from "@/Components/NavLink.vue";
import {Post, Tag} from "@/types/post";
import {Head} from "@inertiajs/vue3";

const props = defineProps<{
  posts: Post[],
  query,
  tags: Tag[],
  latest_posts: Post[]
}>()

const pageTitle = computed(() => {
  return props.posts.length === 1 ? `${props.posts.length} Result for "${props.query}"` : `${props.posts.length} Results for "${props.query}"`
})
</script>

<template>
  <Head title="Search Results"/>
  <main-layout>
    <template #hero>
      <SubPageHero :pageTitle="pageTitle" breadcrumb="Search"></SubPageHero>
    </template>
    <section class="w-3/4 mt-40 mx-auto flex gap-4">
      <ul class="w-4/6">
        <li v-for="post in posts" class="mb-4">
          <blog-post :post="post"></blog-post>
          <NavLink :href="post.slug">Read More</NavLink>
        </li>
      </ul>
      <!--    <blog-post :post="post" :latest_posts="latest_posts" :categories="categories" :tags="tags"></blog-post>-->
      <blog-sidebar :tags="tags" :latest_posts="latest_posts"></blog-sidebar>
    </section>

  </main-layout>
</template>

<style scoped>

</style>