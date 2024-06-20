<script lang="ts" setup>

import AnnouncementBar from "@/Components/AnnouncementBar.vue";
import {Announcement} from "@/types";
import NavLink from "@/Components/NavLink.vue";
const props = defineProps<{
  announcement: Announcement
}>();
</script>

<template>
<!--    &lt;!&ndash; Preloader &ndash;&gt;-->
<!--    <div class="preloader">-->
<!--        <div class="icon"></div>-->
<!--    </div>-->


    <header class="main-header header-style-two">
      <AnnouncementBar :announcement="announcement"></AnnouncementBar>
        <!-- Header Upper -->
        <div class="header-upper max-w-[1200px] mx-auto">
            <div class="flex justify-between items-center">
                <!--Logo-->
                <div class="w-[115px]">
                    <div class="logo">
                      <a href="/#top" title="Eclipsis Studios"><img
                        src="/images/logos/cropped-eclipsis-dark.png" class="main-logo"
                        alt="Eclipsis Studios | Web Agency"
                        title="Eclipsis Studios | Web Agency">
<!--                      <img src="/images/logos/cropped-eclipsis-yellow.png"-->
<!--                                                                   id="thm-logo" alt="Eclipsis Studios | Web Agency"-->
<!--                                                                   title="Eclipsis Studios | Web Agency" class="stricked-logo">-->
                    </a>
                    </div>
                </div>
              <nav class="main-menu navbar-expand-md navbar-light flex justify-between">
                <div class=" show clearfix" id="navbarSupportedContent">
                  <ul class="navigation clearfix flex">
                    <li ><NavLink href="/#top">Home</NavLink>

                    </li>
                    <li>
                      <NavLink href="#about">About Us</NavLink>

                    </li>
                    <li><NavLink href="#services">Services</NavLink>

                    </li>
                    <li><NavLink href="#work">Our Work</NavLink></li>

                    <li><NavLink href="#discover">Discover</NavLink></li>
                    <li><NavLink href="#contNavLinkct">Contact</NavLink></li>

                  </ul>
                </div>
              </nav>
                <div class="nav-outer clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler lg:hidden"><span class="icon flaticon-menu-2"></span><span
                        class="txt">Menu</span></div>

                    <!-- Main Menu -->

                </div>

            </div>
        </div>
        <!--End Header Upper-->


    </header>



</template>

<style scoped>

</style>
