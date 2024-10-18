<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import Editor from "@/Components/Form/Editor.vue";
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <NavLink class="font-semibold text-xl text-gray-800 leading-tight" href="/admin/blog">Blog </NavLink>
        > Create
      </h2>

    </template>
    <section class="my-6 mx-8 ">

    <form>
      <editor initial-content="Enter Blog Text"></editor>
    </form>
    </section>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>