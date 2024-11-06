<template>
  <div class="flex gap-4 px-4 items-start">
    <div v-if="!post" class="">
      <h3>Error finding Post!</h3>
    </div>
    <div class="mb-6 w-3/4" v-else>

      <div v-if="!post.thumbnail" class="mb-4 rounded-xl overflow-hidden">
        <img
            src="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_1024,h_536/https://blog.snappa.com/wp-content/uploads/2020/01/WP-header-image-size-1024x536.jpg"/>
      </div>
      <div else class="mb-4 rounded-xl overflow-hidden">

        <img
            :src="`/storage/${post.thumbnail}`"/>
      </div>
      <div>
        <div>
          <font-awesome-icon :icon="faClock"></font-awesome-icon>
          <small>{{ formattedDate }}</small>

        </div>
      </div>
      <div class="mb-4">

        <h2 class="text-4xl">{{ post.title }}</h2>
      </div>
      <article class="prose py-4" v-html="post.body">
      </article>
    </div>

    <aside class="">
      <div>
        <form>
          <div class="flex items-center bg-gray-100 p-4 rounded-lg mb-4">
            <input type="text" placeholder="Search here..." class=" border-0 bg-transparent">
            <font-awesome-icon :icon="faMagnifyingGlass" size="lg"></font-awesome-icon>
          </div>
        </form>
      </div>
      <div class="bg-gray-100 p-4 rounded-lg mb-4">
        Latest Post

      </div>
      <div class="bg-gray-100 p-4 rounded-lg ">
        Tags
        <ul class="flex">
          <base-tag v-for="tag in tags" :tag="tag"></base-tag>
        </ul>
      </div>
    </aside>
  </div>
</template>
<script lang="ts" setup>
import {Post, Tag} from "@/types/post";
import {faClock, faMagnifyingGlass} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {useFormatDate} from "@/Composables/useFormatDate";


const props = defineProps<{
  post: Post,
  tags: Tag[],
}>()
const {formattedDate} = useFormatDate(props.post.created_at)

</script>