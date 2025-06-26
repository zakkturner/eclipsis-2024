<script setup lang="ts">
import {nextTick, ref, watch} from "vue";
import gsap from "gsap";

const props = defineProps<{
  message: string;
}>()
const msgContainer = ref(null)

const messageAnimation = async () => {
  await nextTick();
  gsap.fromTo(msgContainer.value, {x: 200, opacity: 0}, {x: 0, duration: .7, opacity: 1, ease: 'power3.inOut', delay: .5});
  setTimeout(() => {
    gsap.to(msgContainer.value, {x: 200, opacity: 0, duration: .5, ease: 'power3.inOut'});

  }, 5000)
}
watch(() => props.message, (newMessage) => {
  if (newMessage) {
    messageAnimation();
  }
});
</script>

<template>
  <Teleport to="body">
    <div ref="msgContainer" class="fixed z-[999] bottom-2 right-2 shadow bg-white p-4 rounded " v-if="message">
      <p class="text-green-600 font-bold text-lg">{{ message }}</p>
    </div>
  </Teleport>
</template>

<style scoped>

</style>