<script setup lang="ts">

import MainLayout from "@/Layouts/MainLayout.vue";
import SubPageHero from "@/Components/UI/SubPageHero.vue";
import {computed} from "vue";
import BlogSidebar from "@/Components/Blog/BlogSidebar.vue";
import {Post, Tag} from "@/types/post";
import {Head} from "@inertiajs/vue3";
import BlogList from "@/Components/Blog/BlogList.vue";
import {BreadCrumb} from "@/types/types";

const props = defineProps<{
  posts: Post[],
  query,
  tags: Tag[],
  latest_posts: Post[],

}>()

const breadCrumbs: BreadCrumb[] = [
  {
    title: "Home",
    link: "/"
  },
  {
    title: "Blog",

  },

]
</script>

<template>
  <Head title="Blog"/>
  <main-layout>
    <template #hero>
      <SubPageHero pageTitle="Our Blog" :breadcrumbs="breadCrumbs"></SubPageHero>
    </template>
    <section class=" min-h-screen bg-white">
      <div class=" flex  gap-x-6 w-3/4 py-40 mx-auto">
        <blog-list :posts="posts"/>
        <blog-sidebar :tags="tags" :latest_posts="latest_posts"></blog-sidebar>
      </div>
    </section>

  </main-layout>
</template>