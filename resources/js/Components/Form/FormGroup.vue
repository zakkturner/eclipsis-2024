<template>
  <div class="flex flex-col">
    <label class="capitalize" :for="props.for">{{ props.text ?? props.for }}</label>
    <slot v-if="!socials"></slot>
    <div v-else class="flex items-center">
      <span class="px-4 py-2 bg-gray-100 text-center rounded-tl rounded-bl border h-full border-gray-300 border-r-0">@</span>
      <slot/>
    </div>
  </div>
</template>
<script lang="ts" setup>
import TextInput from "@/Components/Form/TextInput.vue";

const props = defineProps<{
  for: string;
  text?: string;
  socials?: boolean
}>()
</script>
