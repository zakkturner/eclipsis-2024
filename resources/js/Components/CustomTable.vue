<script setup lang="ts">
import NavLink from "@/Components/NavLink.vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps<{
  tableHeadings?: string[];
}>();
</script>

<template>
  <div class="overflow-x-auto">
    <table class="w-full border-collapse border border-eclipsis-gold">
      <!-- Table Headings -->
      <thead class="bg-eclipsis-navy text-white">
      <tr>
        <th
            v-for="heading in tableHeadings"
            :key="heading"
            class="border border-eclipsis-gold px-4 py-2 text-left capitalize"
        >
          {{ heading }}
        </th>
      </tr>
      </thead>

      <!-- Table Body -->
      <tbody>
      <slot/>
      </tbody>
    </table>
  </div>

  <div class="flex justify-center mt-6">
    <Link class="bg-eclipsis-gold px-8 py-4 rounded text-white border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
              ease-in-out" as="button" type="button" href="/dashboard">Back To Dashboard
    </Link>
  </div>
</template>
