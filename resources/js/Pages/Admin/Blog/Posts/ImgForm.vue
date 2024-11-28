<template>
  <img v-if="form.thumbnail && formUI.thumbnailPreview == null" :src="`/storage/${form.thumbnail}`"/><img :src="formUI.thumbnailPreview"
                                                                                                          v-if="formUI.thumbnailPreview"/>
  <div class="pt-2 flex flex-col  ">
    <label
        for="fileInput"
        class="cursor-pointer bg-blue-500 text-white px-4 py-2 rounded-md"
    >
      Choose File
    </label>
    <input id="fileInput" class="hidden" type="file" accept="image/*" @change="onFileChange"/>
    <span v-if="formUI.fileName" class="truncate max-w-xs text-gray-700">{{ formUI.fileName }}</span>

  </div>
</template>
<script lang="ts" setup>
const props = defineProps<{
  form,
  formUI
}>()
const onFileChange = (event) => {
  const file = event.target.files[0]
  if (file) {
    props.form.thumbnail = file
    props.formUI.fileName = file.name;
    const fileReader = new FileReader()
    fileReader.addEventListener('load', () => {
      props.formUI.thumbnailPreview = fileReader.result
    })
    fileReader.readAsDataURL(file)
  }
  console.log(file)
}
</script>