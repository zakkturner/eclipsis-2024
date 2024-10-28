<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import {Post, Tag, Category} from "@/types/post";
import BaseTag from "@/Components/UI/BaseTag.vue";

const {posts, tags, categories} = defineProps<{
  posts: Post[],

  category: Category

}>()
</script>

<template>
  <Head title="Blog"/>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog >
        <NavLink class="font-semibold text-xl text-gray-800 leading-tight" href="/admin/blog/categories">Categories</NavLink>
        > {{ category.name }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
          <div class="p-6 text-gray-900">
            <div>
              <h3>

              </h3>
              Posts | <span>Category: {{ category.name }}</span>
            </div>
            <div>
              <div v-if="posts.length <= 0" class="">
                <h3>No Post created yet</h3>
              </div>
              <ul v-else>
                <li v-for="post in posts" :key="post.id">
                  <a :href="`/admin/blog/post/${post.slug}`">{{ post.title }}</a>
                </li>
              </ul>
            </div>
            <div>
              <NavLink href="/admin/blog/post/create">Add New Post</NavLink>
            </div>
          </div>
        </div>

      </div>

    </div>

  </AuthenticatedLayout>
</template>

<style scoped>

</style>