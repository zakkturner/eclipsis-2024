<script lang="ts" setup>
import {onBeforeMount, onMounted, provide, ref, watch} from "vue";
import {Head, Link} from '@inertiajs/vue3';
import TheHeader from "@/Components/Header/TheHeader.vue";
import {Announcement, CTA, Service, Testimonial} from "@/types/types";
import TheHero from "@/Components/TheHero.vue";
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
import SignUp from "@/Components/Blog/SignUp.vue";
import TheFooter from "@/Components/Footer/TheFooter.vue";
import CtaComponent from "@/Components/CTA/CtaComponent.vue";

const props = defineProps<{

  announcement?: Announcement,
  services: Service[],
  posts: Post[],
  projects: Project[],
  testimonials: Testimonial[]
  company_info: any,
  cta: CTA
}>();

onBeforeMount(() => {
  const serviceStore = useServicesStore();
  if (props.services) {
    serviceStore.setServices(props.services);
  }
})

provide('posts', props.posts);
provide('company_info', props.company_info)
const cta = props.cta[0]
</script>

<template>
  <Head>
    <title>Welcome</title>
    <meta name="description"
          content="At Eclipsis Studios, we are dedicated to helping small business owners thrive in today's digital age. Our team of experts specializes in web development and design,
          providing solutions tailored to each client's unique problems. We understand that your time is valuable, let us take the technical load off of your shoulders.">
  </Head>

  <main-layout :announcement="announcement">
    <template #hero>
      <TheHero></TheHero>
    </template>
    <About id="about"></About>
    <CtaComponent :cta="cta"/>
    <Services id="services"></Services>
    <Projects :projects="projects" id="portfolio"></Projects>
    <TestimonialParallax id="testimonials"></TestimonialParallax>
    <Testimonials v-if="testimonials.length > 0" :testimonials="testimonials"></Testimonials>
    <Contact id="contact"></Contact>
    <BlogCarousel :posts="posts" id="blog"></BlogCarousel>
    <SignUp/>
    <TheFooter/>
  </main-layout>


</template>
