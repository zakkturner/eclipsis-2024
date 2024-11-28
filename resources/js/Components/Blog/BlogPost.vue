<script lang="ts" setup>
import {Category, Post, Tag} from "@/types/post";
import {faClock} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {useFormatDate} from "@/Composables/useFormatDate";
import BlogSidebar from "@/Components/Blog/BlogSidebar.vue";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";
import {useIsShow} from "@/Composables/useIsShow";


const props = defineProps<{
  post: Post,
  tags?: Tag[],
  categories?: Category[],
  latest_posts?: Post[]
}>()

const {formattedDate} = useFormatDate(props.post.created_at)
const page = usePage();

// const isShow = computed(() => {
//   return route().current() == 'blog.show'
// });
const currentRoute = route().current();
const {isShow} = useIsShow(currentRoute, 'blog.show')
</script>
<template>
  <div class=" items-start ">
    <div v-if="!post" class="">
      <h3>Error finding Post!</h3>
    </div>
    <div class="mb-6 " v-else>
      <div v-if="!post.thumbnail" class="mb-4 rounded-xl overflow-hidden">
        <img

            src="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_1024,h_536/https://blog.snappa.com/wp-content/uploads/2020/01/WP-header-image-size-1024x536.jpg"/>
      </div>
      <div else class="mb-4 rounded-xl overflow-hidden">

        <img
            class="object-cover w-full"
            :src="`/storage/${post.thumbnail}`"/>
      </div>
      <div>
        <div class="flex items-center">
          <font-awesome-icon class="text-eclipsis-gold mr-2" :icon="faClock"></font-awesome-icon>
          <time class="text-eclipsis-navy font-semibold">{{ formattedDate }}</time>
        </div>
      </div>
      <article class="prose py-4" v-html="post.body" v-if="isShow">
      </article>
      <article class="prose py-4" v-html="post.excerpt" v-else>
      </article>
      <hr v-if="isShow"/>
      <div class="flex justify-between mt-4" v-if="isShow">
        <div class="flex items-end">
          <h5 class="uppercase text-black font-bold mr-1">Categories</h5>
          <p class="text-sm">
            <a :href="`/blog/category/${categories[0].name.split(' ').join('-').toLowerCase()}`">
              {{ categories[0].name }}<span v-if="categories[1]">, </span>
            </a>
            <a v-if="categories[1]" :href="`/blog/category/${categories[1].name.split(' ').join('-').toLowerCase()}`">
              {{ categories[1].name }}
            </a>
          </p>
        </div>
        <div class="flex items-end" v-if="tags.length > 0">
          <h5 class="uppercase text-black font-bold mr-1">Tagged</h5>
          <p class="text-sm">
            <a class="capitalize" :href="`/blog/${categories[0].name.split(' ').join('-').toLowerCase()}`">
              {{ tags[0].name }} <span v-if="tags[1]">,</span>
            </a>
            <a v-if="tags[1]" class="capitalize" :href="`/blog/${tags[1].name.split(' ').join('-').toLowerCase()}`">
              {{ tags[1].name }}
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
