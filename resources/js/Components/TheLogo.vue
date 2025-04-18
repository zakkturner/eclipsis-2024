<script setup lang="ts">
const props = defineProps<{
  dark?: boolean
}>()
</script>

<template>
  <div class="w-[175px]">
    <div class="logo">
      <a href="/#top" title="Eclipsis Studios">
        <img
            src="/images/logos/cropped-eclipsis-yellow.png" class="main-logo"
            alt="Eclipsis Studios | Web Agency"
            title="Eclipsis Studios | Web Agency" v-if="!dark">
        <img
            src="/images/logos/cropped-eclipsis-dark.png" class="main-logo"
            alt="Eclipsis Studios | Software Agency"
            title="Eclipsis Studios | Software Agency" v-else>
        <!--                      <img src="/images/logos/cropped-eclipsis-yellow.png"-->
        <!--                                                                   id="thm-logo" alt="Eclipsis Studios | Web Agency"-->
        <!--                                                                   title="Eclipsis Studios | Web Agency" class="stricked-logo">-->
      </a>
    </div>
  </div>
</template>

<style scoped>

</style>