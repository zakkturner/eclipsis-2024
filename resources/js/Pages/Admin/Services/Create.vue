<script lang="ts"  setup>
import {computed, ModelRef, reactive} from "vue";
import {Link, router} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Service} from "@/types";
import {useCountChars} from "@/Composables/useCountChars";
import {useLowChars} from "@/Composables/useLowChars";

const body: ModelRef<string> = defineModel()



const form: Service = reactive({
    title: null,
    description: "",
    is_visible: false
});
function submit(){

    router.post('/admin/services', form);
}

</script>

<template>
  <AuthenticatedLayout>
<div class="flex py-10 items-center h-screen">
    <div class="w-1/3 mx-auto">
        <div class="mb-4">

            <h3 class="text-3xl font-bold">
                Create Service
            </h3>
        </div>
        <form @submit.prevent="submit" class="mb-10">
          <div class="flex flex-col mb-4">
            <label>Title ( <span :class="useLowChars(150, 'title')">{{useCountChars(150, form.title)}}  Characters Left </span>) </label>
            <input @keyup="useCountChars" v-model="form.title" rows="8" cols="2" maxlength="150" ></input>
          </div>
            <div class="flex flex-col mb-4">
                <label>Description ( <span :class="useLowChars(250, form.description)">{{useCountChars(250, form.description)}}  Characters Left
                </span>) </label>
                <textarea @keyup="useCountChars" v-model="form.description" rows="8" cols="2" maxlength="250" ></textarea>
            </div>
            <div class="flex flex-col mb-4 w-full items-end">
                <label>Active?</label>
                <input type="checkbox" name="is_visible" v-model="form.is_visible">
            </div>

            <button type="submit" class="bg-green-500 py-2 px-4 text-white rounded">Add Service</button>
        </form>

        <div class="mt-4">
            <Link class="bg-eclipsis-gold px-8 py-4 rounded text-white border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
            ease-in-out" as="button" type="button" href="/admin/services">Back To Services</Link>
        </div>

    </div>
</div>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>
