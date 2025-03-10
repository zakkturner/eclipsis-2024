<script lang="ts" setup>
import {ref} from 'vue';
import AnnouncementBar from "@/Components/AnnouncementBar.vue";
import {Announcement} from "@/types/types";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faBars} from "@fortawesome/free-solid-svg-icons";
import TheLogo from "@/Components/TheLogo.vue";
import {useUiStateStore} from "@/store";
import gsap from "gsap";
import {routes} from "@/router/routes";
import NavLink from "@/Components/NavLink.vue";

const uiStore = useUiStateStore()


const props = defineProps<{
  announcement?: Announcement
}>();

const mobileBtn = ref(null);
const navRoutes = routes;
const openMenu = (): void => {
  uiStore.toggleMenu()
  gsap.to(mobileBtn, {x: -100, duration: .5})
}

</script>

<template>


  <header class="main-header h-fit header-style-two lg:border-b lg:border-gray-400 bg-eclipsis-navy lg:pb-6">
    <AnnouncementBar :announcement="announcement"></AnnouncementBar>
    <!-- Header Upper -->
    <div class="header-upper max-w-[90%] xl:max-w-[1600px] absolute lg:relative w-full -translate-x-1/2 left-1/2 ">
      <div class="flex justify-between items-center mx-2">
        <!--Logo-->
        <the-logo></the-logo>
        <nav class="hidden lg:block ">
          <ul class="flex">
            <li v-for="route in navRoutes">
              <NavLink :href="route.path">{{ route.name }}</NavLink>
            </li>
          </ul>
        </nav>
        <div class="lg:hidden nav-outer clearfix">
          <!--Mobile Navigation Toggler-->
          <button ref="mobileBtn" class="mobile-nav-toggler  hover:cursor-pointer" @click="openMenu">
            <font-awesome-icon :icon="faBars" size="2x" class="text-eclipsis-gold"/>
          </button>
        </div>
      </div>
    </div>
    <!--End Header Upper-->
  </header>


</template>

<style scoped>

</style>
