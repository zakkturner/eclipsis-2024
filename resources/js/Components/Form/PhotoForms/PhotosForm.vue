<script setup lang="ts">

import {faPlus} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import Modal from "@/Components/Modal.vue";
import {Ref, ref} from "vue";
import {BasePhoto} from "@/types/types";
import EditPhotoForm from "@/Components/Form/PhotoForms/EditPhotoForm.vue";
import AddPhoto from "@/Components/Form/PhotoForms/AddPhoto.vue";

const props = defineProps<{
  photos: BasePhoto[]
  showPage?: {
    type: boolean,
    default: false
  }
}>()

const isOpen = ref(false);
const selectedPhoto: Ref<BasePhoto> = ref(null);

const selectPhoto = (photo: BasePhoto) => {

  selectedPhoto.value = photo;
  isOpen.value = true;
}
const closeModal = () => {
  selectedPhoto.value = null
  isOpen.value = false
}
</script>

<template>
  <ul class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 justify-between">
    <li v-for="photo in photos" @click="selectPhoto(photo)"
        class=" rounded overflow-hidden hover:cursor-pointer hover:grayscale w-full h-[300px] ">
      <img class="w-full h-full" :src="`/storage/${photo.img_src}`" alt="" srcset="">
    </li>
    <li class=" rounded overflow-hidden bg-gray-800 w-full h-[300px] " v-if="!showPage">
      <div class="flex items-center justify-center justify-center h-full ">
        <button @click="isOpen = true" class="bg-gray-700 p-8 rounded-full text-gray-300">
          Add
          <font-awesome-icon :icon="faPlus"></font-awesome-icon>
        </button>

      </div>
    </li>
  </ul>


  <modal maxWidth="6xl" :centered="true" @close="closeModal" :closeable="true" :show="isOpen">
    <edit-photo-form :position="selectedPhoto.position" :alt="selectedPhoto.alt" v-if="selectedPhoto" :selected-photo="selectedPhoto"/>
    <add-photo v-else></add-photo>
  </modal>

</template>

