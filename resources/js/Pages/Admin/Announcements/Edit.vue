<script lang="ts"  setup>
import {ModelRef, reactive, onMounted} from "vue";
import {Link, router} from "@inertiajs/vue3";
import {Announcement} from "@/types/types";
import TextArea from "@/Components/Form/TextArea.vue";
const props = defineProps<{
  announcement : Announcement
}>();
const body: ModelRef<string> = defineModel()
function countChars(){
  if (form.body)
  {
    return 150 - form.body.length;

  }
  return 150;
}

const form = reactive({
  id: props.announcement.id,
  body: props.announcement.body,
  is_visible: props.announcement.is_visible
});

function submit(id : number){

  router.put(`/announcements/${id}`, form);
}

</script>

<template>
  <div class="flex py-10 items-center h-screen">
    <div class="w-1/3 mx-auto">
      <div class="mb-4">

        <h3 class="text-3xl font-bold">
          Edit Announcement
        </h3>
      </div>
      <form @submit.prevent="submit(form.id)" class="mb-10">
        <div class="flex flex-col mb-4">
          <label>Body ( <span :class="{'text-red-500': countChars() < 5 }">{{countChars()}}  Characters Left </span>) </label>

          <TextArea @keyup="countChars" v-model="form.body" rows="8" cols="2" maxlength="150" ></TextArea>
        </div>
        <div class="flex flex-col mb-4 w-full items-end">
          <label>Active?</label>

          <input type="checkbox" name="is_visible" v-model="form.is_visible" :checked="form.is_visible" :true-value="1" :false-value="0">
        </div>

        <button type="submit" class="bg-green-500 py-2 px-4 text-white rounded">Update Announcement</button>
      </form>
      <hr class="my-10">
      <div >
        <Link class="bg-eclipsis-gold px-8 py-4 rounded text-white border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
        ease-in-out" as="button" type="button" href="/announcements">Back To Announcements</Link>
      </div>

    </div>
  </div>
</template>

<style scoped>

</style>
