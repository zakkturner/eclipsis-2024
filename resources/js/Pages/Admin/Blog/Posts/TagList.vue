<template>
  <ul class="flex mb-4 flex-wrap">
    <base-tag :indexRoute="indexRoute" v-for="tag in tags" :tag="tag" key="tag.name">
      <button v-if="!indexRoute" class="ml-2 " @click.prevent="handleRemoveTag(tag)">
        <font-awesome-icon class="w-1/2" size="lg" :icon="faClose"></font-awesome-icon>
      </button>
    </base-tag>
  </ul>
</template>
<script lang="ts" setup>
import {Tag} from "@/types/post";
import {useTags} from "@/Composables/useTags";
import {faClose} from "@fortawesome/free-solid-svg-icons";
import BaseTag from "@/Components/UI/BaseTag.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

const props = defineProps<{
  tags: Tag[];
  indexRoute?: boolean
}>();
const {removeTag} = useTags(props.tags)
const handleRemoveTag = (tag: Tag): void => {


  // const index = tags.value.findIndex((t) => t.id === tag.id);
  const index = props.tags.indexOf(tag);
  // console.log(index)
  if (index > -1) props.tags.splice(index, 1);


}

</script>