<script setup lang="ts">
const props = defineProps<{
  tableHeadings?: string[];
}>();
</script>

<template>
  <div class="">
    <div class="flex justify-between border-b-2 border-eclipsis-gold  bg-eclipsis-navy text-white">
      <div v-for="heading in tableHeadings" class="border-r-2 border-eclipsis-navy  w-1/6">

        <h5 class="capitalize p-2">{{ heading }}</h5>
      </div>

    </div>
  </div>
  <ul>
    <slot/>
  </ul>
  <hr class="my-6"/>
  <div class="flex justify-center">
    <NavLink class="bg-eclipsis-gold px-8 py-4 rounded text-white border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
        ease-in-out" as="button" type="button" href="/dashboard">Back To Dashboard
    </NavLink>
  </div>
</template>
