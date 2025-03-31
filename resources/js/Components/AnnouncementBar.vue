<script lang="ts" setup>
import {Announcement} from "@/types/types";
import {faFacebook, faInstagram, faTwitter, faXTwitter} from "@fortawesome/free-brands-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faX} from "@fortawesome/free-solid-svg-icons/faX";
import {faPhone} from "@fortawesome/free-solid-svg-icons";


const props = defineProps<{
  announcement: Announcement
}>();

</script>

<template>
  <div class="bg-eclipsis-navy hidden lg:block">
    <div class="flex justify-between items-center py-4  mx-auto max-w-[90%] xl:max-w-[1600px]">
      <div>

        <h6 class="text-white" v-if="announcement">{{ announcement.body }}</h6>
        <h6 class="text-white" v-else>Welcome To Eclipsis Studios</h6>
      </div>
      <div class="flex text-white ">
        <div class="mr-4 text-eclipsis-gold">
          <font-awesome-icon :icon="faPhone"/>
          <span class="text-white">
                404-482-3287
          </span>
        </div>
        <ul class="flex justify-between">
          <li class="mr-4">
            <a href="https://twitter.com/eclipsisdev" aria-label="Eclipsis Studios X Link">
              <span>
                <font-awesome-icon :icon="faXTwitter"/>
              </span>
            </a>
          </li>
          <li class="mr-4"><a href="https://www.facebook.com/eclipsisstudiosllc" aria-label="Eclipsis Studios Facebook Link"><span>
            <font-awesome-icon :icon="faFacebook"></font-awesome-icon>
          </span>
          </a></li>
          <li>
            <a href="https://www.instagram.com/eclipsisstudios/" aria-label="Eclipsis Studios Instagram Link">
              <span>
                <font-awesome-icon :icon="faInstagram"></font-awesome-icon>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </div>
</template>

