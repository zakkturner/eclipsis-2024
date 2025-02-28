<script setup lang="ts">

import SectionTitle from "@/Components/UI/SectionTitle.vue";
import BaseSection from "@/BaseSection.vue";
import {Project} from "@/types/project";
import gsap from "gsap";
import {ref} from "vue";
import ProjectItem from "@/Components/Projects/ProjectItem.vue";
import {useBackgroundImage} from "@/Composables/useBackgroundImage";

const props = defineProps<{
  projects: Project[]
}>()

const {backgroundImage} = useBackgroundImage()


</script>
<!---->
<template>
  <base-section class="bg-gray-100">
    <section-title subtitle="Our Work" title="View Latest Projects"></section-title>
    <div class="grid grid-cols-1 justify-items-center sm:grid-cols-2 xl:grid-cols-3 gap-4">
      <project-item v-for="project in projects" :backgroundImage="backgroundImage(project.project_photos)" :key="project.id"
                    :project="project"></project-item>
    </div>
  </base-section>
</template>