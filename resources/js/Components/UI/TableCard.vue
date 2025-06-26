<script setup lang="ts">

import {faPencil, faTrash} from "@fortawesome/free-solid-svg-icons";
</script>

<template>
  <div class="w-full mx-auto flex flex-col justify-center">
    <div class="flex w-full justify-between items-center mb-10 border-b-2 pt-4 px-6">
      <div class="flex ">
        <slot name="filters"></slot>
      </div>
      <slot name="add-btn"></slot>
    </div>
    <div class="px-6">
      <slot name="table"></slot>
    </div>
  </div>
</template>

<style scoped>

</style>