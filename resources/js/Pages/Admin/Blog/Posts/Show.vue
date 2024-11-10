<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, usePage} from "@inertiajs/vue3";
import {Category, Post, Tag} from "@/types/post";
import {computed} from "vue";
import dayjs from "dayjs";
import BlogPost from "@/Components/Blog/BlogPost.vue";

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
    <div v-if="message" class="alert
    bg-green-500 p-4 w-full  z-10 text-center">
      <p class="text-white font-bold">{{ message }}</p>
    </div>
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
            <BlogPost :post="post" :categories="categories"/>
            <div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </AuthenticatedLayout>
</template>