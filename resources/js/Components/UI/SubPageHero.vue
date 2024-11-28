<script setup lang="ts">

import {computed} from "vue";
import {BreadCrumb} from "@/types/types";


const props = defineProps<{
  pageTitle: string,
  breadcrumbs?: BreadCrumb[]
  postTitle?: string,
  category?: string

}>()

</script>

<template>
  <section
      class="
        h-4/6
        bg-[url('/images/code.jpg')]
         bg-no-repeat
         bg-cover
         bg-center">
    <div class="p-28 bg-gradient-to-b from-10% from-eclipsis-navy to-transparent">
      <div class="flex justify-center h-full items-center ">
        <div class="text-center px-2">
          <div class="mb-8">
            <h1 class="text-white text-4xl lg:text-6xl font-black uppercase">{{ pageTitle }}</h1>
          </div>
          <div class="mb-8">
            <ul class="text-lg font-semibold text-gray-100 lg:text-4xl flex justify-center">
              <!--              <a href="/">Home</a> - <a v-if="postTitle" href="/blog">Blog</a><a v-if="category" href=""></a> <span>{{ breadcrumb }}</span>-->
              <li v-for="breadcrumb in breadcrumbs" :key="breadcrumb.title"
                  class="mr-2 text-sm uppercase after:content-['-'] after:ml-2 last:after:hidden">
                <a class="hover:text-eclipsis-gold transition ease-in-out" :href="breadcrumb.link" v-if="breadcrumb.link">{{ breadcrumb.title }}</a>
                <h5 v-else class="text-eclipsis-gold">{{ breadcrumb.title }}</h5>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>

  </section>
</template>

<style scoped>

</style>