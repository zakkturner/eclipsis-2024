<script lang="ts" setup>
import { Head, Link } from '@inertiajs/vue3';
import TheHeader from "@/Components/TheHeader.vue";
import {Announcement, Service} from "@/types/types";
import TheHero from "@/Components/TheHero.vue";
import MobileMenu from "@/Components/MobileMenu.vue";
import {useUiStateStore} from "@/store";
import {onBeforeMount, onMounted, ref, watch} from "vue";
import gsap from "gsap";
import ServiceList from "@/Components/Services/ServiceList.vue";
import {useServicesStore} from "@/store/services";
import Services from "@/Components/Services/Services.vue";
const props = defineProps<{
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    announcement: Announcement,
    services: Service[]

}>();

const serviceStore = useServicesStore();
onBeforeMount(() =>{
  if(props.services){
    serviceStore.setServices(props.services);
  }
})
// function handleImageError() {
//     document.getElementById('screenshot-container')?.classList.add('!hidden');
//     document.getElementById('docs-card')?.classList.add('!row-span-1');
//     document.getElementById('docs-card-content')?.classList.add('!flex-row');
//     document.getElementById('background')?.classList.add('!hidden');
// }

const uiStore = useUiStateStore();
const main = ref(null);
watch(
    () => uiStore.isMenuOpen,
    (newVal) => {
      if (newVal) {

        gsap.to(main.value, { scale: .15, x: 100, opacity: 0, y: 150, duration: 0.5, ease: 'power2.out' });
      } else {
        gsap.to(main.value, { x: 0, scale: 1, y: 0, opacity: 1,  duration: 0.5, ease: 'power2.in', delay: 1 });
      }
    },
    { immediate: true }
);

</script>

<template>
    <Head title="Welcome" />

    <mobile-menu></mobile-menu>
    <div ref="main" class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 absolute z-50 top-0 left-0 w-full" >

      <TheHeader :announcement="announcement"></TheHeader>
      <TheHero></TheHero>

      <Services></Services>

    </div>


</template>
