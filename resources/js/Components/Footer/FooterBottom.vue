<script lang="ts" setup>
import {inject} from "vue";
import TheLogo from "@/Components/TheLogo.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faFacebookSquare, faInstagramSquare, faSquareXTwitter, faYoutubeSquare} from "@fortawesome/free-brands-svg-icons";

const companyInfo: any = inject('company_info');
</script>
<template>
  <div class="py-6 bg-[#112239]">
    <div class="max-w-[90%] xl:max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between">
      <div class="flex ite items-center mb-10 md:mb-0">
        <div class="border-r border-gray-400 pr-2 mr-6">
          <the-logo></the-logo>
        </div>
        <div>
          <small class="text-gray-400 text-sm">
            © copyright 2025 by Eclipsis Studios
          </small>
        </div>
      </div>
      <div class="flex justify-between" v-if="companyInfo">
        <div v-if="companyInfo.facebook_url" class="mr-10">
          <a :href="companyInfo.facebook_url" target="_blank">
            <font-awesome-icon size="xl" class="text-gray-400" :icon="faFacebookSquare"
                               aria-label="Eclipsis Studios Facebook Link"></font-awesome-icon>
          </a>
        </div>
        <div v-if="companyInfo.twitter_url" class="mr-10">
          <a :href="companyInfo.twitter_url" target="_blank" aria-label="Eclipsis Studios X Link">
            <font-awesome-icon size="xl" class="text-gray-400" :icon="faSquareXTwitter"></font-awesome-icon>
          </a>
        </div>
        <div v-if="companyInfo.youtube_url" class="mr-10">
          <a :href="companyInfo.youtube_url" target="_blank" aria-label="Eclipsis Studios Youtube Link">
            <font-awesome-icon size="xl" class="text-gray-400" :icon="faYoutubeSquare"></font-awesome-icon>
          </a>
        </div>
        <div v-if="companyInfo.instagram_url">
          <a :href="companyInfo.instagram_url" aria-label="Eclipsis Studios Instagram Link" target="_blank">
            <font-awesome-icon size="xl" class="text-gray-400" :icon="faInstagramSquare"></font-awesome-icon>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
