<script lang="ts" setup>

import {Post} from "@/types/post";
import BlogPost from "@/Components/Blog/BlogPost.vue";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps<{
  posts: Post[]
}>()
</script>
<template>
  <ul class="w-4/6" v-if="posts.length > 0">
    <li v-for="post in posts" class="mb-4">
      <blog-post :post="post"></blog-post>
      <NavLink :href="`/blog/${ post.slug }`">Read More</NavLink>
    </li>
  </ul>
  <div v-else>
    <h2>No Posts Yet!</h2>
  </div>
</template>
