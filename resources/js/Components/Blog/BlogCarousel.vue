<script setup lang="ts">
import {SwiperSlide, Swiper} from 'swiper/vue';
// Import Swiper styles
import 'swiper/css';
import {Post} from "@/types/post";
import {computed} from "vue";
import dayjs from "dayjs";
import SectionTitle from "@/Components/UI/SectionTitle.vue";
import LinkButton from "@/Components/LinkButton.vue";
import BaseSection from "@/Components/UI/BaseSection.vue";

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
  <base-section padding="md">
    <template #title>
      <section-title subtitle="Our News" title="News & Articles"></section-title>
    </template>

    <div class="flex flex-col items-center" v-if="posts.length > 0">
      <swiper
          :slidesPerView="1"
          :spaceBetween="30"
          :loop="true"
          :pagination="{clickable: true}"
          :breakpoints="{
              768: { slidesPerView: 2 }
          }"
          :autoplay="{
              delay: 2500,
              disableOnInteraction: false,
          }"
          class="w-full h-full">
        <swiper-slide class="text-center " v-for="post in posts">
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
      </swiper>
      <div>
        <link-button link="/blog">View All</link-button>
      </div>
    </div>
    <div class="py-20 text-2xl flex justify-center" v-else>
      <h2 class="text-eclipsis-gold">No Posts Yet!</h2>
    </div>

  </base-section>


</template>