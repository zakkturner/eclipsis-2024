<script setup lang="ts">

import FormGroup from "@/Components/Form/FormGroup.vue";
import {router, useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/Form/TextInput.vue";
import TextArea from "@/Components/Form/TextArea.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faEnvelope, faLocationDot, faPhone} from "@fortawesome/free-solid-svg-icons";
import BaseSection from "@/Components/UI/BaseSection.vue";


const form = useForm({
  name: "",
  email: "",
  phone: "",
  company: "",
  website_url: "",
  budget: "",
  notes: "",
  is_active: true,
  lead_source: `Created by Contact Form`,
})

const handleSubmit = () => {
  console.log(form);
  router.post('/clients', form, {
    preserveScroll: true, // Prevents scrolling to top on validation error
    onSuccess: () => form.reset(),
    onError: (errors) => {
      console.log(errors); // Debugging errors
    }
  });
}

</script>

<template>
  <base-section color="blue">
    <div class="flex flex-col xl:flex-row justify-between ">
      <div>
        <div class="mb-8">
          <h3 class="text-white uppercase text-5xl font-bold mb-10">Get in touch with us<span class="text-eclipsis-gold">.</span></h3>
          <small class="text-gray-500 text-base font-bold">Let's Start A Conversation</small>

        </div>
        <ul>
          <li class="flex  items-center mb-4">
            <div class="bg-eclipsis-gold h-16 w-16 flex justify-center items-center rounded-full mr-4">
              <font-awesome-icon class="text-eclipsis-navy" size="sm" :icon="faLocationDot"/>
            </div>
            <div>
              <h6 class="uppercase text-white text-xs mb-2">Location</h6>
              <small class="text-gray-400 text-base">Atlanta, GA</small>
            </div>
          </li>
          <li class="flex items-center mb-4">
            <div class="bg-eclipsis-gold h-16 w-16 flex justify-center items-center rounded-full mr-4">
              <font-awesome-icon class="text-eclipsis-navy" size="sm" :icon="faEnvelope"/>
            </div>
            <div>
              <h6 class="uppercase text-white text-xs mb-2">Email Address</h6>
              <small class="text-gray-400 text-base">admin@eclipsis.dev</small>
            </div>
          </li>
          <li class="flex items-center mb-4">
            <div class="bg-eclipsis-gold h-16 w-16 flex justify-center items-center rounded-full mr-4">
              <font-awesome-icon class="text-eclipsis-navy" size="sm" :icon="faPhone"/>
            </div>
            <div>
              <h6 class="uppercase text-white text-xs mb-2">Call now</h6>
              <small class="text-gray-400 text-base">404-482-3287</small>
            </div>
          </li>
        </ul>
      </div>
      <div class="flex flex-col">

        <form class="">
          <div class="flex flex-col md:flex-row gap-4 mb-4">
            <text-input type="text" v-model="form.name" placeholder="Your Name" required></text-input>
            <text-input type="text" v-model="form.phone" placeholder="Your Phone" required></text-input>
          </div>
          <div class=" gap-4 mb-4">
            <text-input class="w-full" type="text" v-model="form.email" placeholder="Your Email" required></text-input>
          </div>
          <div class="flex flex-col md:flex-row gap-4 mb-4">
            <text-input type="text" v-model="form.company" placeholder="Company Name" required></text-input>
            <text-input type="text" v-model="form.website_url" placeholder="Website Url" required></text-input>
          </div>
          <div class="flex gap-4 mb-4">
            <select class="w-full rounded text-eclipsis-navy" v-model="form.budget" placeholder="Budget" required>
              <option selected value="" disabled>Select a Budget</option>
              <option selected value="$0-1000">$0-1500</option>
              <option selected value="$0-1000">$1500-3000</option>
              <option selected value="$0-1000">$3000-5000</option>
              <option selected value="$0-1000">$5000-10000</option>
              <option selected value="$0-1000">$10000+</option>
            </select>
          </div>
          <div class="flex gap-4 mb-4">
            <text-area class="w-full" rows="10" type="text" v-model="form.notes" placeholder="Tell Us About Your Project" required></text-area>

          </div>
          <div class="flex gap-4 mb-4">
            <button class="bg-eclipsis-gold p-6 text-eclipsis-navy font-semibold text-sm rounded" @click.prevent="handleSubmit">Send Message</button>
          </div>
        </form>
        <div class="bg-white relative  rounded p-4" v-if="$page.props.flash.message">
          <button @click="$page.props.flash.message = null"
                  class="rounded-full text-eclipsis-navy bg-eclipsis-gold w-8 h-8 flex justify-center items-center absolute -top-4 -right-4 z-50">X
          </button>
          <p class="text-green-600">{{ $page.props.flash.message }}</p>
        </div>
        <div class="flex flex-col bg-white mb-2 rounded p-4" v-if="Object.keys($page.props.errors).length > 0">
          <h4 class="text-lg text-red-500">Errors:</h4>
          <ul>
            <li v-for="error in $page.props.errors">
              <p class="text-red-500">{{ error }}</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </base-section>

</template>

<style scoped>

</style>