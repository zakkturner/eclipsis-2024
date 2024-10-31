<script setup lang="ts">
import {SwiperSlide} from 'swiper/vue';
import {register} from 'swiper/element/bundle';
// Import Swiper styles
import 'swiper/css';
import {Post} from "@/types/post";

const props = defineProps<{
  posts: Post[]
}>()
const onSwiper = (swiper) => {
  console.log(swiper);
};
const onSlideChange = () => {
  console.log('slide change');
};
</script>

<template>
  <section class="max-w-2xl mx-auto my-20 ">
    <div class="text-center">
      <h4 class="text-lg">Our News</h4>
      <h2 class="text-6xl">News & Articles</h2>
    </div>
    <swiper-container>
      <swiper-slide v-for="post in posts">{{ post.title }}</swiper-slide>
    </swiper-container>
  </section>


</template>

<style scoped>

</style>