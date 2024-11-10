<script lang="ts" setup>
import {Category, Post, Tag} from "@/types/post";
import {faClock, faMagnifyingGlass} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {useFormatDate} from "@/Composables/useFormatDate";
import GrayCard from "@/Components/UI/GrayCard.vue";
import BaseTag from "@/Components/UI/BaseTag.vue";


const props = defineProps<{
  post: Post,
  tags: Tag[],
  categories: Category[],
  latest_posts: Post[]
}>()
const {formattedDate} = useFormatDate(props.post.created_at)

</script>
<template>
  <div class="flex gap-4 px-4 items-start">
    <div v-if="!post" class="">
      <h3>Error finding Post!</h3>
    </div>
    <div class="mb-6 w-8/12" v-else>

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
      <!--      <div class="mb-4">-->

      <!--        <h2 class="text-4xl">{{ post.title }}</h2>-->
      <!--      </div>-->
      <article class="prose py-4" v-html="post.body">
      </article>
      <hr/>
      <div class="flex justify-between mt-4">
        <div class="flex items-end">
          <h5 class="uppercase text-black font-bold mr-1">Categories</h5>
          <p class="text-sm">
            <a :href="`/blog/${categories[0].name.split(' ').join('-').toLowerCase()}`">
              {{ categories[0].name }},
            </a>
            <a :href="`/blog/${categories[1].name.split(' ').join('-').toLowerCase()}`">
              {{ categories[1].name }}
            </a>
          </p>
        </div>
        <div class="flex items-end">
          <h5 class="uppercase text-black font-bold mr-1">Tagged</h5>
          <p class="text-sm">
            <a :href="`/blog/${tags[0].name.split(' ').join('-').toLowerCase()}`">
              {{ tags[0].name }},
            </a>
            <a :href="`/blog/${tags[1].name.split(' ').join('-').toLowerCase()}`">
              {{ tags[1].name }}
            </a>
          </p>
        </div>
      </div>
    </div>

    <aside class="w-4/12">
      <div>
        <form>
          <div class="flex items-center bg-gray-100 p-4 rounded-lg mb-4">
            <input type="text" placeholder="Search here..." class=" border-0 bg-transparent w-full">
            <font-awesome-icon :icon="faMagnifyingGlass" size="lg"></font-awesome-icon>
          </div>
        </form>
      </div>
      <gray-card title="Latest Post">
        <ul class="flex flex-col">
          <li v-for="new_post in latest_posts" class="flex items-center mb-4">
            <img v-if="new_post.thumbnail" :src="`/storage/${new_post.thumbnail}`" class="w-16 h-16 rounded-full mr-4"/>
            <img v-else src="/images/no-image.jpg" class="w-16 h-16 rounded-full mr-4"/>
            <a :href="`/blog/${new_post.slug}`" class="uppercase font-semibold text-sm">{{ new_post.title }}</a>
          </li>
        </ul>
      </gray-card>


      <gray-card title="Tags">
        <ul class="flex">

          <base-tag v-for="tag in tags" :tag="tag" route="index"></base-tag>
        </ul>
      </gray-card>

    </aside>
  </div>
</template>
