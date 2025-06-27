<script lang="ts" setup>

import {Post} from "@/types/post";
import BlogPost from "@/Components/Blog/BlogPost.vue";
import NavLink from "@/Components/NavLink.vue";
import LinkButton from "@/Components/LinkButton.vue";

const props = defineProps<{
  posts: Post[]
}>()
</script>
<template>
  <ul class="w-4/6" v-if="posts.length > 0">
    <li v-for="post in posts" class="mb-10">
      <blog-post :post="post"></blog-post>
      <link-button :light="true" :link="`/blog/${ post.slug }`">Read More</link-button>
    </li>
  </ul>
  <div v-else>
    <h2>No Posts Yet!</h2>
  </div>
</template>
