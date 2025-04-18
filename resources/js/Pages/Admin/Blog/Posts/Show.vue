<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, usePage} from "@inertiajs/vue3";
import {Category, Post, Tag} from "@/types/post";
import {computed} from "vue";
import dayjs from "dayjs";
import BlogPost from "@/Components/Blog/BlogPost.vue";
import BlogSidebar from "@/Components/Blog/BlogSidebar.vue";
import FlashMessage from "@/Components/FlashMessage.vue";

const {post} = defineProps<{
  post: Post,
  tags: Tag[],
  categories: Category[],
  message: string

}>()
const page = usePage();
const formattedCreated = computed(() => {
  return dayjs(post.created_at).format("MMMM DD, YYYY")
})
</script>

<template>
  <Head :title="post.title"/>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog</h2>
    </template>

    <div class="py-12" :class="message && 'pt-20'">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
          <div class=" text-gray-900">
            <div class=" p-2 flex w-full justify-between mb-4 border-b-2 border-eclipsis-gold  bg-eclipsis-navy text-white">
              <h3>Preview Post</h3>
              <div class="flex ">
                <a class="bg-eclipsis-navy py-2 px-4 text-white mr-2 rounded border-2 border-eclipsis-gold" :href="`/admin/post/${post.slug}/edit`">
                  Publish</a>

                <a class="bg-eclipsis-gold py-2 px-4 text-white mr-2 rounded" :href="`/admin/blog/post/${post.slug}/edit`">Edit</a>
                <a class="bg-red-600 py-2 px-4 text-white rounded">Delete</a>
              </div>
            </div>
            <div class="flex gap-8 p-8">
              <div>
                <BlogPost :post="post" :categories="categories"/>
                <h3 class="mb-6 text-2xl font-black">{{ post.title }}</h3>
              </div>
              <blog-sidebar :tags="tags"></blog-sidebar>
            </div>
          </div>
        </div>

      </div>

    </div>
    <flash-message :message="message"></flash-message>
  </AuthenticatedLayout>
</template>