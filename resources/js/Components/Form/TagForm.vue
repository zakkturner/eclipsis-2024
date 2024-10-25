<script setup lang="ts">
// const props = defineProps<{
//   tags:
// }>()
import {ref} from "vue";

const tagContent = ref('')
const newTag = ref(false)

const emit = defineEmits(['pushToTags'])
const handleAddTag = () =>{

  newTag.value = true;
  // form.tags.push()
  emit('pushToTags',tagContent.value )
  tagContent.value = ''


}
</script>

<template>
  <input v-model="tagContent"  @keydown.,.prevent="handleAddTag" placeholder="Add Tags">

</template>

<style scoped>

</style>