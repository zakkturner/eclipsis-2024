<script lang="ts" setup>

import {Link} from "@inertiajs/vue3";
import {Announcement} from "@/types/types";

const props = defineProps<{
    announcements: Announcement[]
}>();
</script>

<template>
<div class="w-3/4 mx-auto flex flex-col justify-center">
  <div class="">
    <div class="flex justify-between border-b-2 border-eclipsis-gold  bg-eclipsis-navy text-white">
      <div class="border-r-2 border-eclipsis-navy  w-1/3">

        <h5>Body</h5>
      </div>
      <div class="border-r-2 border-eclipsis-navy w-1/3">
        <h5>Active?</h5>
      </div>
      <div class=" w-1/3">
        Edit
      </div>
    </div>
  </div>
    <ul>
        <li v-for="announcement in announcements" :key="announcement.id" class="border-eclipsis-navy border-t-2 first:border-t-0 last:border-b-2">

            <div class="flex justify-between">

                <div class="border-r-2 border-l-2 border-eclipsis-navy w-1/3">
                    {{announcement.body}}
                </div>
                <div class="border-r-2 border-eclipsis-navy w-1/3">
                    {{announcement.is_visible ?  "Visible" : "Not Visible" }}
                </div>
              <div class="w-1/3 flex justify-center py-2">

                <Link
                    class="bg-eclipsis-gold  px-4 py-2 rounded text-white border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
                    ease-in-out"   :href="'/announcements/' + announcement.id + '/edit'">Edit</Link>
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
        ease-in-out" as="button" type="button" href="/announcements/create">+</Link>
  </div>
</template>

<style scoped>

</style>
