<script setup lang="ts">
import {Project} from "@/types/project";
import MainLayout from "@/Layouts/MainLayout.vue";
import {Head} from "@inertiajs/vue3";
import SubPageHero from "@/Components/UI/SubPageHero.vue";
import {BreadCrumb} from "@/types/types";
import {computed} from "vue";
import CaseStudy from "@/Pages/Projects/CaseStudy.vue";
import ProjectItem from "@/Components/Projects/ProjectItem.vue";
import {useBackgroundImage} from "@/Composables/useBackgroundImage";

const props = defineProps<{
  project: Project,
  similar_projects: Project[]
}>();
const breadCrumbs: BreadCrumb[] = [
  {
    title: "Home",
    link: "/"
  },
  {
    title: "Projects",
    link: "/view-projects"
  },
  {
    title: props.project.title
  }
]

const projectPhotos = computed(() => {
  const photos = {featured: null, first: null, second: null, third: null};

  props.project.project_photos.forEach(photo => {
    switch (photo.position) {
      case "featured":
        photos.featured = photo;
        break;
      case "first":
        photos.first = photo;
        break;
      case "second":
        photos.second = photo;
        break;
      case "third":
        photos.third = photo;
        break;
    }
  });

  return photos;
});
const {backgroundImage} = useBackgroundImage()
</script>

<template>
  <Head :title="project.title"/>
  <main-layout>
    <template #hero>
      <SubPageHero :pageTitle="project.title" :breadcrumbs="breadCrumbs"></SubPageHero>
    </template>
    <section class="w-3/4 mt-40 mb-40 mx-auto flex gap-4 ">
      <div class="w-[1170px] mx-auto">
        <div class="w-full h-[556px] mx-auto overflow-hidden  rounded-lg mb-10">
          <img v-if="projectPhotos.featured" class="w-full grayscale hover:grayscale-0 transition-all ease-in-out transition-duration-300"
               :alt="projectPhotos.featured?.alt"
               :src="`/storage/${projectPhotos.featured?.img_src}`"/>
          <img v-else class="w-full h-full grayscale hover:grayscale-0 transition-all ease-in-out transition-duration-300" alt="No Image"
               src="/images/no-image.jpg"/>
        </div>
        <div class="flex justify-between my-5">
          <div class="w-3/4 pr-20">
            <h5 class="text-xl my-4 font-extrabold uppercase mt-0">{{ project.title }}</h5>
            <p>
              {{ project.description }}
            </p>
          </div>
          <div class="w-1/4">
            <div class="mb-4">
              <h4 class="text-lg font-bold uppercase">Client</h4>
              <h6>{{ project.client.company }}</h6>
            </div>
            <div class="mb-4">
              <h4 class="text-lg font-bold uppercase">Services</h4>
              <ul>
                <li v-for="service in project.services">
                  <h6>{{ service.title }},</h6>
                </li>
              </ul>

            </div>
          </div>
        </div>
        <hr class="my-20" v-if="project.case_studies.length > 0">

        <case-study v-if="project.case_studies.length > 0" :case-study="project?.case_studies[0]" :photos="projectPhotos"/>

        <hr class="my-20">
        <div class="flex justify-center">
          <h2 class="text-4xl">Similar Work</h2>
        </div>
        <hr class="my-20">
        <div class="flex gap-x-8">
          <div v-for="project in similar_projects">
         
            <project-item :backgroundImage="backgroundImage(project.project_photos)"
                          :project="project"></project-item>
          </div>
        </div>
      </div>
    </section>

  </main-layout>
</template>