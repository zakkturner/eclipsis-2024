<script setup lang="ts">

import {faBars} from "@fortawesome/free-solid-svg-icons";
import {routes} from "@/router/routes";
import gsap from "gsap";
import {useUiStateStore} from "@/store";
import {ref} from "vue";
import TheLogo from "@/Components/TheLogo.vue";
import NavLink from "@/Components/NavLink.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

const navRoutes = routes;
const uiStore = useUiStateStore()
const mobileBtn = ref(null);
const openMenu = (): void => {
  uiStore.toggleMenu()
  gsap.to(mobileBtn, {x: -100, duration: .5})
}
</script>

<template>
  <header class="fixed z-[999] w-full h-32 lg:h-auto bg-eclipsis-gold -top-40 lg:-top-20 border-b border-gray-400 shadow">
    <div class="header-upper max-w-[90%] xl:max-w-[1600px] absolute lg:relative w-full -translate-x-1/2 left-1/2 py-5">
      <div class="flex justify-between items-center mx-2">
        <!--Logo-->
        <the-logo :dark="true"></the-logo>
        <nav class="hidden lg:block ">
          <ul class="flex">
            <li v-for="route in navRoutes">
              <NavLink :light="true" :href="route.path">{{ route.name }}</NavLink>
            </li>
          </ul>
        </nav>
        <div class="block lg:hidden nav-outer clearfix">
          <!--Mobile Navigation Toggler-->
          <button ref="mobileBtn" class="mobile-nav-toggler  hover:cursor-pointer" @click="openMenu">
            <font-awesome-icon :icon="faBars" size="2x" class="text-eclipsis-navy"/>
          </button>
        </div>
      </div>
    </div>
  </header>
</template>

<style scoped>

</style>