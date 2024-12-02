<script setup lang="ts">


import {Project, ProjectPhoto} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DashboardContainer from "@/Components/UI/DashboardContainer.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faPlus} from "@fortawesome/free-solid-svg-icons";
import PhotosForm from "@/Components/Dashboard/PhotosForm.vue";

const props = defineProps<{
  project: Project;
  project_photos: ProjectPhoto[]
}>()
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects Edit</h2>
    </template>
    <DashboardContainer>
      <form>
        {{ project }}

      </form>
      <hr class="my-4"/>
      <div>
        <photos-form :photos="project_photos"></photos-form>
      </div>
    </DashboardContainer>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>