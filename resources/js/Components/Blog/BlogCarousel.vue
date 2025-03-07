<script setup lang="ts">
import {SwiperSlide} from 'swiper/vue';
// Import Swiper styles
import 'swiper/css';
import {Post} from "@/types/post";
import {computed} from "vue";
import dayjs from "dayjs";
import SectionTitle from "@/Components/UI/SectionTitle.vue";

const props = defineProps<{
  posts: Post[]
}>()
const onSwiper = (swiper) => {
  console.log(swiper);
};
const onSlideChange = () => {
  console.log('slide change');
};
const formattedCreated = (post: Post) => computed(() => {
  return dayjs(post.created_at).format('MMMM DD, YYYY')
})
</script>

<template>
  <section class="max-w-[90%] xl:max-w-6xl mx-auto my-20 ">
    <section-title subtitle="Our News" title="News & Articles"></section-title>
    <swiper-container
        :slidesPerView="1"
        :spaceBetween="30"
        :loop="true"
        :pagination="{
          clickable: true,


        }"
        :breakpoints="{
        768: { slidesPerView: 2 }
        }"
        :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
        class="w-full h-full"

    >

      <swiper-slide class="text-center mb-16" v-for="post in posts">
        <div class="w-full h-auto mb-8">
          <a :href="`/blog/${post.slug}`">
            <img class="w-full h-[380px] object-cover" :src="`/storage/${post.thumbnail}`" :alt="post.title" srcset="">
          </a>
        </div>
        <div>
          <h5 class="text-eclipsis-gold">{{ formattedCreated(post).value }}</h5>
          <h3 class="text-4xl text-black font-black">
            <a :href="`/blog/${post.slug}`">
              {{ post.title }}
            </a>
          </h3>
        </div>
      </swiper-slide>
    </swiper-container>
  </section>


</template>