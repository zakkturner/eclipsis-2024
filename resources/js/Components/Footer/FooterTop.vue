<script setup lang="ts">
import NavLink from "@/Components/NavLink.vue";
import {Link} from '@inertiajs/vue3';
import {inject} from "vue";
import {Post} from "@/types/post";
import {useFormatDate} from "../../Composables/useFormatDate";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faEnvelope, faLocationArrow, faPhone} from "@fortawesome/free-solid-svg-icons";

const posts: Post[] = inject("posts")
const company_info: any = inject("company_info")
</script>
<template>
  <div class="border-b border-gray-400 bg-eclipsis-navy">

    <div class="max-w-[90%] xl:max-w-6xl mx-auto py-20 ">
      <div class="grid grid-cols-1 gap-y-10  md:grid-cols-2 md:gap-x-6 lg:gap-y-0 lg:grid-cols-4 lg:justify-items-center">
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
          <ul v-if="posts.length > 0">
            <li class="mb-6" v-for="post in posts.slice(0,2)" :key="post.id">
              <div class="flex">
                <div class="w-20 mr-4">
                  <img :src="`storage/${post.thumbnail}`"/>
                </div>
                <div>
                  <p class="text-eclipsis-gold">{{ useFormatDate(post.updated_at).formattedDate }}</p>
                  <a class="text-gray-400" :href="`blog/${post.slug}`">{{ post.title }}</a>
                </div>
              </div>
            </li>
          </ul>
          <h6 v-else class="text-eclipsis-gold">Coming Soon</h6>
        </div>
        <div>
          <h5 class="text-white text-2xl font-black mb-6">Contact</h5>
          <div class="flex gap-2 mb-4 pb-4 items-center border-b border-gray-400">
            <font-awesome-icon class="text-eclipsis-gold" :icon="faPhone"></font-awesome-icon>
            <p class="text-gray-400">
              {{ company_info.phone }}
            </p>
          </div>
          <div class="flex gap-2 mb-4 pb-4 items-center border-b border-gray-400">

            <font-awesome-icon class="text-eclipsis-gold" :icon="faEnvelope"></font-awesome-icon>
            <a :href="`mailto:${company_info.email}`" class="text-gray-400">{{ company_info.email }}</a>
          </div>
          <div class="flex gap-2 mb-4 items-center">

            <font-awesome-icon class="text-eclipsis-gold" :icon="faLocationArrow"></font-awesome-icon>
            <p class="text-gray-400">Atlanta, GA</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
