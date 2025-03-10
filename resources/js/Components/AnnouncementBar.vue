<script lang="ts" setup>
import {Announcement} from "@/types/types";


const props = defineProps<{
  announcement: Announcement
}>();

</script>

<template>
  <div class="bg-eclipsis-navy">
    <div class="flex justify-between items-center py-4  mx-auto max-w-[90%] xl:max-w-[1600px]">
      <div>

        <h6 class="text-white" v-if="announcement">{{ announcement.body }}</h6>
        <h6 class="text-white" v-else>Welcome To Eclipsis Studios</h6>
      </div>
      <div class="flex text-white ">
        <div class="mr-2 text-eclipsis-gold">
          <VIcon name="fa-phone"/>
          <span class="text-white">
404-482-3287
</span></div>
        <ul class="flex justify-between">
          <li class="mr-2">
            <a href="https://twitter.com/eclipsisdev">
              <span><VIcon name="fa-twitter"/></span>
            </a>
          </li>
          <li class="mr-2"><a href="https://www.facebook.com/eclipsisstudiosllc"><span>
                  <VIcon name="fa-facebook"/></span>
          </a></li>
          <li><a href="https://www.instagram.com/eclipsisstudios/"><span><VIcon name="fa-instagram"/></span></a></li>
        </ul>
      </div>
    </div>

  </div>
</template>

