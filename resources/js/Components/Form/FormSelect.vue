<script setup lang="ts">
import {onMounted, ref} from "vue";

const model = defineModel({
  type: String,
  required: true,
});
type DataProp = {
  label: string;
  value: string;
}
const props = defineProps<{
  label: string;
  dataProp: DataProp[];
}>()
const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute('autofocus')) {
    input.value.focus();
  }
});

defineExpose({focus: () => input.value.focus()});
</script>

<template>
  <select class="w-full rounded  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" ref="input" v-model="model"
          id="status">
    <option selected disabled value="">{{ label }}</option>
    <option v-for="data in dataProp" :value="data.value">{{ data.label }}</option>
  </select>
</template>

<style scoped>

</style>