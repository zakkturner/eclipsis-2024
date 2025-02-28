<script setup lang="ts">
import {ref, watch, onMounted, nextTick} from 'vue';
import {gsap} from 'gsap';
import {useUiStateStore} from "@/store";
import {Link} from '@inertiajs/vue3'

const uiStore = useUiStateStore();
const menu = ref(null);
const menuItems = ref([]);

const routes = [
  {
    name: 'Home',
    path: '/'
  },
  {
    name: 'About',
    path: '#about'
  },
  {
    name: 'Services',
    path: '#services'
  },
  {
    name: 'Portfolio',
    path: '#portfolio'
  },
  {
    name: 'Testimonials',
    path: '#testimonials'
  },
  {
    name: 'Blog',
    path: '#blog'
  },
  {
    name: 'Contact',
    path: '#contact'
  }
];

watch(
    () => uiStore.isMenuOpen,
    (newVal) => {
      if (newVal) {

        gsap.fromTo(menuItems.value,
            {opacity: 0, x: -20},
            {opacity: 1, x: 0, duration: 0.5, ease: 'power2.out', stagger: 0.1}
        );
      } else {

        gsap.to(menuItems.value,
            {opacity: 0, x: -20, duration: 0.5, ease: 'power2.in', stagger: 0.1}
        );
      }
    },
    {immediate: true}
);
const mouseEnterAnimation = (e) => {
  // console.log( "mouse entered")
  gsap.to(e.target, {color: '#cea434', duration: 0.3, ease: 'power2.out'});
};

const mouseExitAnimation = (e) => {
  // console.log( "mouse entered")
  gsap.to(e.target, {color: '#fff', duration: 0.3, ease: 'power2.out'});
};
</script>

<template>
  <section class=" flex justify-between bg-[url('/images/moon.gif')] bg-cover bg-no-repeat bg-center  h-screen w-full p-2">
    <nav>
      <ul>
        <li ref="menuItems" v-for="route in routes" key="route.name" class="mb-4">
          <Link @mouseover="mouseEnterAnimation" @mouseleave="mouseExitAnimation" class="text-5xl lg:text-9xl text-white" :href="route.path">{{
              route
                  .name
            }}
          </Link>
        </li>
      </ul>
    </nav>
    <div>
      <button @click="uiStore.closeMenu" class="text-5xl">
        <img src="/images/icons/exit.ico"/>
      </button>
    </div>
  </section>
</template>

<style scoped>

</style>