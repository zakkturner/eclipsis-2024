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
import Projects from "@/Components/Projects/Projects.vue";
import ProjectsGrid from "@/Components/Projects/ProjectsGrid.vue";

const props = defineProps<{
  projects: Project[]
}>();
const breadCrumbs: BreadCrumb[] = [
  {
    title: "Home",
    link: "/"
  },
  {
    title: "Projects",

  },

]

</script>


<template>


  <Head title="Projects"/>
  <main-layout>
    <template #hero>
      <SubPageHero pageTitle="Projects" :breadcrumbs="breadCrumbs"></SubPageHero>
    </template>
    <section class="flex gap-4 bg-white ">
      <div class="my-40 mx-auto w-3/4">
        <projects-grid :projects="projects"></projects-grid>
      </div>
    </section>
  </main-layout>

</template>

<style scoped>

</style>