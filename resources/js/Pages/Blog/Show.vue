<script setup lang="ts">


import {Category, Post, Tag} from "@/types/post";
import {Head} from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import BlogPost from "@/Components/Blog/BlogPost.vue";
import TheHero from "@/Components/TheHero.vue";
import BlogSidebar from "@/Components/Blog/BlogSidebar.vue";
import SubPageHero from "@/Components/UI/SubPageHero.vue";
import {computed} from "vue";
import {BreadCrumb} from "@/types/types";

const props = defineProps<{
  post: Post,
  tags: Tag[],
  categories: Category[],
  latest_posts: Post[]
}>()

const breadCrumbs: BreadCrumb[] = [
  {
    title: "Home",
    link: "/"
  },
  {
    title: "Blog",
    link: "/blog"
  },
  {
    title: props.categories[0].name,
    link: `/blog/${props.categories[0].name.split(" ").join("-").toLowerCase()}`
  },
  {
    title: props.post.title,

  },
]

</script>

<template>
  <Head :title="post.title"/>
  <main-layout>
    <template #hero>
      <SubPageHero :pageTitle="post.title" :breadcrumbs="breadCrumbs"></SubPageHero>
    </template>
    <section class="w-3/4 mt-40 mx-auto flex gap-4">
      <div class="w-4/6">

        <blog-post :post="post" :latest_posts="latest_posts" :categories="categories" :tags="tags"></blog-post>
      </div>
      <blog-sidebar :latest_posts="latest_posts" :tags="tags"></blog-sidebar>
    </section>

  </main-layout>
</template>

<style scoped>

</style>