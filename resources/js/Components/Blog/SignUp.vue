<script setup lang="ts">

import TextInput from "@/Components/Form/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {router, useForm} from "@inertiajs/vue3";

const form: { first_name: string, last_name: string, email: string } = useForm({
  first_name: "",
  last_name: "",
  email: ""
})
const handleSubmit = () => {
  router.post('/newsletter', form)

}
</script>

<template>
  <section class="bg-eclipsis-gold">
    <div class="max-w-[90%] xl:max-w-6xl mx-auto py-10 md:py-20">
      <div class="flex flex-col xl:flex-row items-center ">
        <div class="mr-6">
          <h3 class=" text-4xl text-center md:text-left md:text-5xl font-black ">Subscribe to Our Newsletter</h3>
        </div>
        <div class="w-4/6 xl:w-2/6 flex-1 mt-4 xl:mt-0">
          <form @submit.prevent="handleSubmit">
            <div class="flex flex-col md:flex-row gap-2 mb-2">
              <text-input placeholder="Enter First Name" type="text" class="w-full" v-model="form.first_name"></text-input>
              <text-input placeholder="Enter Your Name" type="text" class="w-full" v-model="form.last_name"></text-input>

            </div>
            <text-input placeholder="Enter Your Email" type="email" class="w-full mb-2" v-model="form.email"></text-input>
            <primary-button type="submit">Join</primary-button>
          </form>

        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>