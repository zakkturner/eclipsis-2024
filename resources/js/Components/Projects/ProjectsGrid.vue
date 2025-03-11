<script setup lang="ts">

import ProjectItem from "@/Components/Projects/ProjectItem.vue";
import {useBackgroundImage} from "@/Composables/useBackgroundImage";
import {Project} from "@/types/project";

const {backgroundImage} = useBackgroundImage()
const props = defineProps<{
  projects: Project[]
}>()
</script>

<template>
  <div class="grid grid-cols-1 max-w-[90%] mx-auto  xl:max-w-6xl justify-items-center sm:grid-cols-2 xl:grid-cols-3 gap-10 xl:gap-4 ">
    <project-item v-for="project in projects" :backgroundImage="backgroundImage(project.project_photos)" :key="project.id"
                  :project="project"></project-item>
  </div>
</template>

<style scoped>

</style>