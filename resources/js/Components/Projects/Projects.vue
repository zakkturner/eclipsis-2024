<script setup lang="ts">

import SectionTitle from "@/Components/UI/SectionTitle.vue";
import BaseSection from "@/BaseSection.vue";
import {Project} from "@/types/project";
import gsap from "gsap";
import {ref} from "vue";
import ProjectItem from "@/Components/Projects/ProjectItem.vue";
import {useBackgroundImage} from "@/Composables/useBackgroundImage";
import LinkButton from "@/Components/LinkButton.vue";
import ProjectsGrid from "@/Components/Projects/ProjectsGrid.vue";

const props = defineProps<{
  projects: Project[]
}>()

const {backgroundImage} = useBackgroundImage()


</script>
<!---->
<template>
  <base-section class="bg-gray-100">
    <section-title subtitle="Our Work" title="View Latest Projects"></section-title>
    <projects-grid :projects="projects"></projects-grid>
    <div class="flex justify-center mt-6">
      <link-button link="/view-projects">View All</link-button>
    </div>
  </base-section>
</template>