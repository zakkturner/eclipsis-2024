<script lang="ts" setup>
import {Head, Link} from '@inertiajs/vue3';
import TheHeader from "@/Components/TheHeader.vue";
import {Announcement, Service} from "@/types/types";
import TheHero from "@/Components/TheHero.vue";
import MobileMenu from "@/Components/MobileMenu.vue";
import {useUiStateStore} from "@/store";
import {onBeforeMount, onMounted, ref, watch} from "vue";
import gsap from "gsap";
import ServiceList from "@/Components/Services/ServiceList.vue";
import {useServicesStore} from "@/store/services";
import Services from "@/Components/Services/Services.vue";
import BlogCarousel from "@/Components/Blog/BlogCarousel.vue";
import {Post} from "@/types/post";
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps<{
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
  announcement: Announcement,
  services: Service[],
  posts: Post[]

}>();

const serviceStore = useServicesStore();
onBeforeMount(() => {
  if (props.services) {
    serviceStore.setServices(props.services);
  }
})


</script>

<template>
  <Head title="Welcome"/>

  <main-layout :announcement="announcement">
    <template #hero>
      <TheHero></TheHero>
    </template>
    <Services></Services>
    <BlogCarousel :posts="posts"></BlogCarousel>
  </main-layout>


</template>
