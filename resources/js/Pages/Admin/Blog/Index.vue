<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import {Post, Tag, Category} from "@/types/post";
import BaseTag from "@/Components/UI/BaseTag.vue";
import TagList from "@/Pages/Admin/Blog/Posts/TagList.vue";

const {posts, tags, categories} = defineProps<{
  posts: Post[],
  tags: Tag[],
  categories: Category[];
  selectedTag?: Tag;
}>()
</script>

<template>
  <Head title="Blog"/>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
          <div class="p-6 text-gray-900">
            <div>
              <h3>

              </h3>
              Posts <span v-if="selectedTag" class="capitalize">Tagged: {{ selectedTag.name }}</span>
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
        <div class="flex">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-2/3 mr-4">
            <div class="p-6  mr-4 text-gray-900 ">
              <div>Categories</div>
              <ul v-if="categories.length > 0">
                <li v-for="category in categories">
                  <a :href="`/admin/blog/categories/${category.name.split(' ').join('-').toLowerCase()}`">{{ category.name }}</a>
                </li>
              </ul>
              <p v-else> No Tags created</p>
            </div>
          </div>
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-1/3">
            <div class="p-6 text-gray-900">
              <div>
                <h3>Tags</h3>

              </div>

              <ul v-if="tags.length > 0">
                <tag-list :indexRoute="true" :tags="tags"></tag-list>
              </ul>
              <p v-else> No Tags created</p>
            </div>
          </div>
        </div>
      </div>

    </div>

  </AuthenticatedLayout>
</template>

<style scoped>

</style>