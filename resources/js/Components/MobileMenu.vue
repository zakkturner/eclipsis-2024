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
const emit = defineEmits(['menuClicked', 'clicked']);

function linksEnter() {
  gsap.fromTo(menuItems.value,
      {opacity: 0, x: -20},
      {opacity: 1, x: 0, duration: 0.5, ease: 'power2.out', stagger: 0.1}
  );
}

function linksExit() {
  gsap.to(menuItems.value,
      {opacity: 0, x: -20, duration: 0.5, ease: 'power2.in', stagger: 0.1}
  );
}

watch(
    () => uiStore.isMenuOpen,
    (newVal) => {
      if (newVal) {
        linksEnter();
      } else {
        linksExit();
      }
    },
    {immediate: true}
);

function handleClick(path) {
  linksExit();
  uiStore.isMenuOpen = false

  setTimeout(() => {
    const targetElement = document.querySelector(path);
    if (targetElement) {
      targetElement.scrollIntoView({behavior: "smooth"});
    }

  }, 1500);
  emit('menuClicked')
}

const mouseEnterAnimation = (e) => {
  // console.log( "mouse entered")
  gsap.to(e.target, {color: '#cea434', duration: 0.3, ease: 'power2.out'});
};

const mouseExitAnimation = (e) => {
  // console.log( "mouse entered")
  gsap.to(e.target, {color: '#fff', duration: 0.3, ease: 'power2.out'});
};

const handleClose = () => {
  uiStore.closeMenu();
  setTimeout(() => {
    emit('menuClicked')

  }, 2000)
}
</script>

<template>
  <section class="overflow-hidden flex justify-between bg-[url('/images/moon.gif')] bg-cover bg-no-repeat bg-center  h-screen w-full p-2">
    <nav>
      <ul>
        <li ref="menuItems" v-for="route in routes" key="route.name" class="mb-4">
          <a @mouseover="mouseEnterAnimation" @mouseleave="mouseExitAnimation" @click.prevent="handleClick(route.path)"
             class="text-5xl lg:text-9xl text-white"
          >{{
              route
                  .name
            }}
          </a>
        </li>
      </ul>
    </nav>
    <div>
      <button @click="handleClose" class="text-5xl">
        <img src="/images/icons/exit.ico"/>
      </button>
    </div>
  </section>
</template>

<style scoped>

</style>