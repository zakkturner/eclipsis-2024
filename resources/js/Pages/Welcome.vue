<script lang="ts" setup>
import {Head, Link} from '@inertiajs/vue3';
import TheHeader from "@/Components/TheHeader.vue";
import {Announcement, Service, Testimonial} from "@/types/types";
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
import Projects from "@/Components/Projects/Projects.vue";
import {Project} from "@/types/project";
import Contact from "@/Components/Contact/Contact.vue";
import TestimonialParallax from "@/Components/Testimonials/TestimonialParallax.vue";
import Testimonials from "@/Components/Testimonials/Testimonials.vue";
import About from "@/Components/About.vue";

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
  posts: Post[],
  projects: Project[],
  testimonials: Testimonial[]
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
    <About id="about"></About>
    <Services id="services"></Services>
    <Projects :projects="projects" id="portfolio"></Projects>
    <TestimonialParallax id="testimonials"></TestimonialParallax>
    <Testimonials v-if="testimonials.length > 0" :testimonials="testimonials"></Testimonials>
    <BlogCarousel :posts="posts" id="blog"></BlogCarousel>
    <Contact id="contact"></Contact>
  </main-layout>


</template>
