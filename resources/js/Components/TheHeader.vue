<script lang="ts" setup>
import {ref} from 'vue';
import AnnouncementBar from "@/Components/AnnouncementBar.vue";
import {Announcement} from "@/types";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faBars} from "@fortawesome/free-solid-svg-icons";
import TheLogo from "@/Components/TheLogo.vue";
import {useUiStateStore} from "@/store";
import gsap from "gsap";

const uiStore = useUiStateStore()


const props = defineProps<{
  announcement: Announcement
}>();

const mobileBtn = ref(null);
const openMenu = (): void =>{
  uiStore.toggleMenu()
gsap.to(mobileBtn, {x: -100, duration: .5})
}
</script>

<template>


    <header class="main-header header-style-two">
      <AnnouncementBar :announcement="announcement"></AnnouncementBar>
        <!-- Header Upper -->
        <div class="header-upper max-w-[1600px] mx-auto absolute w-full -translate-x-1/2 left-1/2">
            <div class="flex justify-between items-center mx-2">
                <!--Logo-->
              <div class="nav-outer clearfix">
                <!--Mobile Navigation Toggler-->
                <button ref="mobileBtn" class="mobile-nav-toggler  hover:cursor-pointer" @click="openMenu">
                  <font-awesome-icon :icon="faBars" size="2x" class="text-eclipsis-gold"/>
                </button>
              </div>
              <the-logo></the-logo>
            </div>
        </div>
        <!--End Header Upper-->
    </header>



</template>

<style scoped>

</style>
