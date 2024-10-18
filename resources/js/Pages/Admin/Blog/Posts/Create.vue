<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import Editor from "@/Components/Form/Editor.vue";
import Card from "@/Components/UI/Card.vue";
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <NavLink class="font-semibold text-xl text-gray-800 leading-tight" href="/admin/blog">Blog </NavLink>
        > Create
      </h2>

    </template>
    <section class="my-6 mx-auto px-4 sm:px-6 max-w-7xl md:px-8">

    <form>
      <div class="flex flex-col gap-4 md:flex-row ">
        <editor initial-content="Enter Blog Text"></editor>
        <hr  class="md:hidden"/>
        <div class="flex flex-col gap-4  mx-auto">
          <card title="Categories"></card>
          <card title="Tags">
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
          </card>
          <card title="Featured Image">
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
          </card>
        </div>



      </div>
    </form>
    </section>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>