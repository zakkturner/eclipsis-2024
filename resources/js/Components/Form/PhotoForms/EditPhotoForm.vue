<script lang="ts" setup>

import {computed, Ref, ref} from "vue";
import {BasePhoto} from "@/types/types";
import DangerButton from "@/Components/DangerButton.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import FormGroup from "@/Components/Form/FormGroup.vue";
import PhotoPosition from "@/Components/Form/PhotoForms/PhotoPosition.vue";
import FlashMessage from "@/Components/FlashMessage.vue";

const {flash} = usePage().props;
const page = usePage()
const props = defineProps<{
  alt?: string,
  position?: string
  selectedPhoto: BasePhoto,
  // message?: string
}>()

const message = computed(() => flash?.message ?? '');
const shouldDelete = ref(false);
const form = useForm({
  position: props.position,
  alt: props.alt,
})
const handleEdit = (photo: BasePhoto) => {
  console.log('edit');
  if (page.url.includes('projects')) {
    form.put(`/admin/project-photos/${props.selectedPhoto.id}`, {
      // preserveScroll: true,

    });
  } else {
    form.put(`/admin/cta-photos/${props.selectedPhoto.id}`, {
      // preserveScroll: true,
    });
  }

}
</script>

<template>
  <div class="w-full flex justify-between p-6 h-full gap-6">
    <img class="w-full h-sm " :src="`/storage/${selectedPhoto.img_src}`"/>
    <div class="flex flex-col">
      <h2 class="text-3xl font-bold">Edit Photo</h2>
      <hr class="my-2">
      <div class="flex flex-col justify-between h-full">
        <form @submit.prevent="handleEdit">
          <div class="flex flex-col ">
            <form-group for="alt">
              <input type="text" v-model="form.alt" class="mr-2"/>
            </form-group>
            <form-group for="position">
              <select type="text" v-model="form.position" class="mr-2 w-100">
                <photo-position></photo-position>
              </select>
            </form-group>
            <PrimaryButton class="h-10 mt-4">Save</PrimaryButton>
          </div>
        </form>
        <div class="mt-6">
          <DangerButton @click.prevent="shouldDelete = true" class="mb-2">Delete Photo</DangerButton>
          <div class="bg-gray-300 p-4 flex flex-col items-center " :class="shouldDelete ? 'visible' : 'invisible'">
            <h5 class="mb-2">Are you sure you want to delete?</h5>
            <div>
              <button class="mr-2 border border-eclipsis-navy px-4 py-1">Yes</button>
              <button class=" border border-eclipsis-navy px-4 py-1" @click="shouldDelete = false">Cancel</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--  <flash-message :message="$page.props.flash.message"></flash-message>-->
</template>
