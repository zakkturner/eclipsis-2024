<script setup lang="ts">
import {Project, ProjectPhoto} from "@/types/project";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DashboardContainer from "@/Components/UI/DashboardContainer.vue";
import PhotosForm from "@/Components/Form/PhotoForms/PhotosForm.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import {reactive} from "vue";
import {Client, Testimonial} from "@/types/types";
import FormGroup from "@/Components/Form/FormGroup.vue";
import {router} from '@inertiajs/vue3'
import TextArea from "@/Components/Form/TextArea.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {faPencil} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps<{
  testimonial: Testimonial;

  client: Client
}>()

</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects Edit</h2>
    </template>
    <DashboardContainer>
      <div class="flex flex-col justify-between mb-4">
        <div class="mb-4">
          <h1 class="text-3xl font-bold mb-4">{{ testimonial.name }}</h1>
          <img :src="`/storage/${testimonial.avatar}`">
        </div>
        <hr>
        <!--        <a class="bg-yellow-400 font-black text-white flex items-center px-4 rounded" :href="`/admin/projects/${project.id}/edit`">Edit Project</a>-->
        <!--      </div>-->
        <div class="my-4">

          <p>{{ testimonial.body }}</p>
        </div>


      </div>
      <div class="w-1/2">
        <NavLink
            class="bg-eclipsis-gold mr-2 px-4 py-2 rounded text-white border-4 border-eclipsis-gold
                                   hover:bg-eclipsis-navy hover:text-black hover:border-eclipsis-gold transition-all ease-in-out transition duration-700 ease-in-out group"
            :href="'/admin/testimonials/' + testimonial.id + '/edit'">
                            <span class="text-eclipsis-navy group-hover:text-eclipsis-gold">
                              <font-awesome-icon :icon="faPencil"></font-awesome-icon>
                            </span>
        </NavLink>
        <secondary-button @click="router.visit('/admin/testimonials')">Go Back</secondary-button>
      </div>
    </DashboardContainer>
  </AuthenticatedLayout>
</template>

