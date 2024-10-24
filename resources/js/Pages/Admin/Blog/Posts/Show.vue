<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import {Post, Tag, Category} from "@/types/post";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faClock} from "@fortawesome/free-solid-svg-icons";
import {computed} from "vue";
import dayjs from "dayjs";

const {post} = defineProps<{
  post: Post,


}>()
const formattedCreated = computed(()=>{
  return dayjs(post.created_at).format("MMMM DD, YYYY")
})
</script>

<template>
  <Head :title="post.title" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
          <div class="p-6 text-gray-900">
            <div class="flex w-full justify-between">
              <h3>Preview Post</h3>
              <div class="flex ">
                <a class="bg-eclipsis-navy py-2 px-4 text-white mr-2 rounded" :href="`/admin/post/${post.slug}/edit`">Publish</a>

                <a class="bg-eclipsis-gold py-2 px-4 text-white mr-2 rounded" :href="`/admin/post/${post.slug}/edit`">Edit</a>
                <a class="bg-red-600 py-2 px-4 text-white rounded">Delete</a>
              </div>
            </div>
            <div class="flex">
              <div v-if="!post" class="">
                <h3>Error finding Post!</h3>
              </div>
              <div class="my-6 w-3/4" v-else>

                <div v-if="!post.thumbnail" class="mb-4 rounded-xl overflow-hidden">
                  <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_1024,h_536/https://blog.snappa.com/wp-content/uploads/2020/01/WP-header-image-size-1024x536.jpg"/>
                </div>
                <div>
                  <div>
                  <font-awesome-icon :icon="faClock"></font-awesome-icon>
                    <small>{{formattedCreated}}</small>

                  </div>
                </div>
                <div class="mb-4">

                  <h2 class="text-4xl">{{post.title}}</h2>
                </div>
                <article class="prose py-4" v-html="post.body">
                </article>
              </div>

                <aside>
                  <div>Search</div>
                  <div>
                    Latest Post

                  </div>
                  <div>
                    Tags
                  </div>
                </aside>

            </div>
            <div>

            </div>
          </div>
        </div>

      </div>

    </div>

  </AuthenticatedLayout>
</template>

<style scoped>

</style>