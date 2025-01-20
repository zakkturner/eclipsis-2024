<script lang="ts" setup>
import {useForm} from '@inertiajs/vue3'
import FormGroup from "@/Components/Form/FormGroup.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
  alt: "",
  img_src: null
})

function handleSubmit() {
  form.post("/admin/project-photos ")
}
</script>
<template>
  <div class="p-4">
    <h3 class="text-2xl mb-4">Add Project Photo</h3>
    <form @submit.prevent="handleSubmit">

      <form-group for="alt">
        <input type="text" v-model="form.alt">
      </form-group>
      <form-group for="photo">
        <input type="file" @input="form.img_src = $event.target.files[0]"/>
      </form-group>
      <div class="mt-2">
        <PrimaryButton type="submit">Submit</PrimaryButton>
      </div>
    </form>
  </div>

</template>


<style lang="scss" scoped>

</style>