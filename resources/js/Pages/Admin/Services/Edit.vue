<script lang="ts" setup>
import {ModelRef, reactive, onMounted} from "vue";
import {Link, router} from "@inertiajs/vue3";
import {Service} from "@/types/types";
import TextArea from "@/Components/Form/TextArea.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {useLowChars} from "@/Composables/useLowChars";
import {useCountChars} from "@/Composables/useCountChars";

const props = defineProps<{
  service: Service
}>();
const description: ModelRef<string> = defineModel()

function countChars() {
  if (form.description) {
    return 150 - form.description.length;

  }
  return 150;
}

const form = reactive({
  id: props.service.id,
  title: props.service.title,
  description: props.service.description || '',
  icon: props.service.icon,
  is_visible: props.service.is_visible
});

function submit(id: number) {

  router.put(`/admin/services/${id}`, form);
}

</script>

<template>
  <AuthenticatedLayout>

    <div class="flex py-10 items-center h-screen">
      <div class="w-1/3 mx-auto">
        <div class="mb-4">

          <h3 class="text-3xl font-bold">
            Edit service
          </h3>
        </div>
        <form @submit.prevent="submit(form.id)" class="mb-10">
          <div class="flex flex-col mb-4">
            <label>Title ( <span :class="useLowChars(150, 'title')">{{ useCountChars(150, form.title) }}  Characters Left </span>) </label>
            <input @keyup="useCountChars" v-model="form.title" rows="8" cols="2" maxlength="150"></input>
          </div>
          <div class="flex flex-col mb-4">
            <label>Font Awesome Class
            </label>
            <input v-model="form.icon" rows="8" cols="2" maxlength="150"></input>
          </div>
          <div class="flex flex-col mb-4">
            <label>Description ( <span :class="useLowChars(250, form.description)">{{ useCountChars(250, form.description) }}  Characters Left
                </span>) </label>
            <textarea @keyup="useCountChars" v-model="form.description" rows="8" cols="2" maxlength="250"></textarea>
          </div>
          <div class="flex flex-col mb-4 w-full items-end">
            <label>Active?</label>

            <input type="checkbox" name="is_visible" v-model="form.is_visible" :checked="form.is_visible" :true-value="1" :false-value="0">
          </div>

          <button type="submit" class="bg-green-500 py-2 px-4 text-white rounded">Update service</button>
        </form>
        <hr class="my-10">
        <div>
          <Link class="bg-eclipsis-gold px-8 py-4 rounded text-white border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
        ease-in-out" as="button" type="button" href="/admin/services">Back To services
          </Link>
        </div>

      </div>
    </div>
  </AuthenticatedLayout>

</template>

<style scoped>

</style>
