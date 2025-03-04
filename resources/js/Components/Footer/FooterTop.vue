<script setup lang="ts">
import NavLink from "@/Components/NavLink.vue";
import {Link} from '@inertiajs/vue3';
import {inject} from "vue";
import {Post} from "@/types/post";

const posts: Post[] = inject("posts")
</script>
<template>
  <div class="border-b border-gray-400 bg-eclipsis-navy">

    <div class="max-w-[90%] md:max-w-6xl mx-auto py-20 ">
      <div class="grid grid-cols-4 justify-items-center">
        <div>
          <h5 class="text-white text-2xl font-black mb-6">About</h5>
          <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere libero officia pariatur quas quia reiciendis
            repellendus totam.
            Aliquam culpa distinctio dolorem doloribus.</p>
        </div>
        <div>
          <h5 class="text-white text-2xl font-black mb-6">Explore</h5>
          <ul class="text-gray-400 flex flex-wrap">
            <li class="w-1/2 mb-6">
              <Link class="" href="#about">About Us</Link>
            </li>
            <li class="w-1/2">
              <Link href="#services">Services</Link>
            </li>
            <li class="w-1/2">
              <Link href="#contact">Contact</Link>
            </li>
            <li class="w-1/2">
              <Link href="#blog">Latest News</Link>
            </li>
          </ul>
        </div>

        <div>
          <h5 class="text-white text-2xl font-black mb-6">News</h5>
          <ul>
            <li v-for="post in posts.slice(0,2)" :key="post.id">
              <a :href="`blog/${post.slug}`">{{ post.title }}</a>
            </li>

          </ul>
        </div>
        <div>
          <h5 class="text-white text-2xl font-black mb-6">Contact</h5>
          <div>
            <p>Phone</p>
          </div>
          <div>
            <p>Email</p>
          </div>
          <div>
            <p>Atlanta, GA</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
