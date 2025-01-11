<script setup lang="ts">

import {faPlus} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import Modal from "@/Components/Modal.vue";
import {Ref, ref} from "vue";
import {BasePhoto} from "@/types/types";
import DangerButton from "@/Components/DangerButton.vue";

const props = defineProps<{
  photos: BasePhoto[]
  showPage?: {
      type: boolean,
      default: false
  }
}>()

const isOpen = ref(false);
const selectedPhoto: Ref<BasePhoto> = ref(null);
const shouldDelete = ref(false);
const selectPhoto = (photo: BasePhoto) => {
  shouldDelete.value = false
  selectedPhoto.value = photo;
  isOpen.value = true;
}
</script>

<template>
  <ul class="flex">
    <li v-for="photo in photos" @click="selectPhoto(photo)" class="mr-6 rounded overflow-hidden hover:cursor-pointer hover:grayscale">
      <img class="w-[200px] h-[300px]" :src="photo.img_src" alt="" srcset="">
    </li>
    <li class="mr-6 rounded overflow-hidden" v-if="!showPage">
      <div class="flex items-center justify-center w-[200px] h-[300px] bg-gray-800">
        <button class="bg-gray-700 p-8 rounded-full text-gray-300">
          Add
          <font-awesome-icon :icon="faPlus"></font-awesome-icon>
        </button>

      </div>
    </li>
  </ul>


  <modal :centered="true" @close="isOpen = false" :closeable="true" :show="isOpen">
    <div class="w-full flex justify-between p-2">
      <img class="w-1/2" :src="selectedPhoto.img_src"/>
      <div class="flex flex-col items-center">
        <DangerButton @click.prevent="shouldDelete = true">Delete</DangerButton>
        <div class="bg-gray-300 p-4 flex flex-col items-center" :class="shouldDelete ? 'visible' : 'invisible'">
          <h5 class="mb-2">Are you sure?</h5>
          <div>
            <button class="mr-2 border border-eclipsis-navy px-4 py-1">Yes</button>
            <button class=" border border-eclipsis-navy px-4 py-1" @click="shouldDelete = false">Cancel</button>
          </div>
        </div>

      </div>
    </div>
  </modal>

</template>

<style scoped>

</style>
