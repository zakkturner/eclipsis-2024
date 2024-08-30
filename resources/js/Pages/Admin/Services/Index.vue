<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { Service } from "@/types";
import {router} from "@inertiajs/vue3";

const {services, message} = defineProps<{
  services: Service[],
  message?: string
}>();


const destroy = ( id) =>{
  router.delete( `/admin/services/${id}`)
}
</script>

<template>
  <Head title="Services" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Services</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <div class="w-full mx-auto flex flex-col justify-center">
              <div class="">
                <div class="flex justify-between border-b-2 border-eclipsis-gold  bg-eclipsis-navy text-white">
                  <div class="border-r-2 border-eclipsis-navy  w-1/3">

                    <h5>Body</h5>
                  </div>
                  <div class="border-r-2 border-eclipsis-navy  w-1/3">

                    <h5>Description</h5>
                  </div>
                  <div class="border-r-2 border-eclipsis-navy w-1/3">
                    <h5>Active?</h5>
                  </div>
                  <div class=" w-1/3">
                    Edit
                  </div>
                  <div class=" w-1/3">
                    Delete
                  </div>
                </div>
              </div>
              <ul>
                <li v-for="service in services" :key="service.id" class="border-eclipsis-navy border-t-2 first:border-t-0 last:border-b-2">

                  <div class="flex justify-between">

                    <div class="border-r-2 border-l-2 border-eclipsis-navy w-1/3">
                      {{service.title}}
                    </div>
                    <div class="border-r-2 border-l-2 border-eclipsis-navy w-1/3">
                      {{service.description}}
                    </div>
                    <div class="border-r-2 border-eclipsis-navy w-1/3">

                      {{service.is_visible == true ?  "Visible" : "Not Visible" }}
                    </div>
                    <div class="w-1/3 border-r-2  border-eclipsis-navy flex justify-center py-2">

                      <Link
                          class="bg-eclipsis-gold  px-4 py-2 rounded text-white border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
                    ease-in-out"   :href="'/admin/services/' + service.id + '/edit'">Edit</Link>
                    </div>
                    <div class="w-1/3 border-r-2  border-eclipsis-navy flex justify-center py-2">


                        <button @click="destroy(service.id)"
                            class="bg-red-600 px-4 py-2 rounded text-white border-4 border-red-600 hover:bg-white hover:text-black transition-all
                    ease-in-out"   >Delete</button>



                    </div>

                  </div>
                </li>
              </ul>


              <hr  class="my-6"/>
              <div class="flex justify-center">
                <Link class="bg-eclipsis-gold px-8 py-4 rounded text-white border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
        ease-in-out" as="button" type="button" href="/dashboard">Back To Dashboard</Link>
              </div>
            </div>
            <div class="fixed left-40 top-96">
              <Link class="bg-green-500 px-4 py-2 text-2xl rounded-full text-white border-4 border-green-500 hover:bg-white hover:text-black transition-all
        ease-in-out" as="button" type="button" href="/admin/services/create">+</Link>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div v-if="message">{{ message }}</div>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>