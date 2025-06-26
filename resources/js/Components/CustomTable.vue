<script setup lang="ts">
import NavLink from "@/Components/NavLink.vue";
import {Link} from "@inertiajs/vue3";
import {computed, ref, watch} from "vue";

type PaginationOptions = {
  show?: boolean;
  itemsPerPage?: number;
  totalItems?: number;
  data: any[];
}
const props = defineProps<{
  tableHeadings?: string[];
  pagination?: PaginationOptions;
}>();
const page = ref(1);

const setPages = computed(() => {
  return Math.ceil(props.pagination?.totalItems /
      props.pagination?.itemsPerPage)
});

const paginate = computed(() => {
  let from = (page.value * props.pagination?.itemsPerPage) - props.pagination?.itemsPerPage;
  let to = (page.value * props.pagination?.itemsPerPage);
  return props.pagination?.data.slice(from, to)

});
const from = computed(() => {
  if (!props.pagination) return 0;
  return (page.value - 1) * props.pagination.itemsPerPage + 1;
});

const to = computed(() => {
  if (!props.pagination) return 0;
  const potentialTo = page.value * props.pagination.itemsPerPage;
  return Math.min(potentialTo, props.pagination.totalItems);
});
const emit = defineEmits<{
  (e: 'update:paginatedData', value: any[]): void;
}>();

// Watch for pagination change
watch(paginate, (val) => {
  emit('update:paginatedData', val);
}, {immediate: true});
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
      <slot :data="paginate"/>
      </tbody>
    </table>
    <div v-if="props.pagination?.show" class="mt-4 flex justify-between">
      <ul class="flex">
        <li v-for="pageButton in setPages">
          <button @click="page = pageButton" class="border-eclipsis-navy border-2 py-2 px-4">{{ pageButton }}</button>
        </li>
      </ul>
      <div>
        <span>Showing {{ from }}-{{ to }} of {{ pagination.totalItems }}</span>
      </div>
    </div>
  </div>

  <div class="flex justify-center mt-6">
    <Link class="bg-eclipsis-gold px-8 py-4 rounded text-white border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
              ease-in-out" as="button" type="button" href="/dashboard">Back To Dashboard
    </Link>
  </div>
</template>
