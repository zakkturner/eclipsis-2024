<script setup>
import {computed, nextTick, ref} from 'vue';
import {Link} from '@inertiajs/vue3';
import gsap from 'gsap';

const props = defineProps({
  href: {
    type: String,
    required: true,
  },
  active: {
    type: Boolean,
  },
  light: {
    type: Boolean,
  }
});
const link = ref(null);
const underline = ref(null);

const handleEnter = () => {
  nextTick(() => {
    gsap.to(underline.value, {scaleX: 1, duration: .5, ease: 'expo.inOut'})

  })
}
const handleLeave = () => {
  nextTick(() => {
    gsap.to(underline.value, {scaleX: 0, duration: .5, ease: 'expo.inOut'})
  });
}
const classes = computed(() =>
    props.active
        ?
        'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 focus:border-eclipsis-gold  transition duration-150 ease-in-out'
        :
        'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white  transition duration-150 ease-in-out'
);
</script>

<template>
  <Link @mouseenter="handleEnter" @mouseleave="handleLeave" ref="link" :href="href" :class="'navlink ' + classes">
      <span class="text-white text-lg  transition-all ease-in-out">
        <slot/>

      </span>
  </Link>
  <div ref="underline" :class="`${light == true ? 'bg-eclipsis-navy' : 'bg-eclipsis-gold' }  h-[2px]  ${props.active
        ? '!scale-x-100' :'scale-x-0'}`"></div>
</template>
<style>

</style>