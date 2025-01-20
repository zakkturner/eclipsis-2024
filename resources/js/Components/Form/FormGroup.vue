<template>
  <div class="flex flex-col">
    <label class="capitalize" :for="props.for">{{ props.text ?? props.for}}</label>
    <slot></slot>
  </div>
</template>
<script lang="ts" setup>
const props = defineProps<{
    for: string;
    text?: string;
}>()
</script>
