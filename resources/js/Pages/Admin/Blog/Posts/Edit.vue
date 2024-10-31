<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import Editor from "@/Components/Form/Editor.vue";
import Card from "@/Components/UI/Card.vue";
import {router, useForm} from "@inertiajs/vue3";
import {computed, reactive, ref, watch, watchEffect} from "vue";
import {Category, Post, Tag} from "@/types/post";
import TagForm from "@/Components/Form/TagForm.vue";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import BaseTag from "@/Components/UI/BaseTag.vue";
import {faClose} from "@fortawesome/free-solid-svg-icons";
import {faXmark} from "@fortawesome/free-solid-svg-icons/faXmark";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

const props = defineProps<{
  categories: Category[];
  post: Post;
  tags: Tag[];
  allCategories: Category[]
}>()

const form = useForm({
  title: props.post.title,
  slug: props.post.slug,
  body: props.post.body,
  excerpt: props.post.excerpt,
  categories: [...props.categories.map(category => category.id)],
  tags: [...props.tags],
  thumbnail: props.post.thumbnail
})
const turnToSlug = (str: string) => {
  return str.toString()                         // Convert to string
      .toLowerCase()                      // Convert to lowercase
      .trim()                             // Remove leading/trailing spaces
      .replace(/[\s\W-]+/g, '-')          // Replace spaces and non-alphanumeric characters with '-'
      .replace(/^-+|-+$/g, '');           // Remove leading/trailing hyphens
}

watchEffect(() => {
  if (form.title != null && form.slug !== '') {

    form.slug = turnToSlug(form.title);
  }

});
const newCategoryContent = ref(null);
const formUI = reactive({
  noChanges: true,
  newCategory: false,
  newTag: false,
  fileName: "",
  thumbnailPreview: null
})
const submitForm = () => {
  const tagIds = form.tags.map(tag => tag.id)
  router.post(`/admin/blog/post/${props.post.id}`, {
    _method: 'put',
    title: form.title,
    slug: form.slug,
    body: form.body,
    excerpt: form.excerpt,
    categories: form.categories,
    tags: tagIds,
    thumbnail: form.thumbnail,
  });

}
const handleFocusOut = () => {
  form.slug = turnToSlug(form.slug);
}


const addCategory = () => {
  router.post('/admin/blog/categories', newCategoryContent)
  formUI.newCategory = false;
  newCategoryContent.value = null;
}
const buttonText = computed(() => {
  if (formUI.newCategory) {
    return 'Cancel'
  } else {
    return 'Create New Category'
  }
})
const handleChange = () => {
  if (form.excerpt === '') {
    // Strip HTML tags from form.body
    const plainText = form.body.replace(/<\/?[^>]+(>|$)/g, "");
    form.excerpt = plainText.substr(0, 150); // Get the first 150 characters
  }

}
const handlePushToTags = (newTag: Tag) => {
  form.tags.push(newTag)
  formUI.newTag = true;
}

const removeTag = (tag: Tag) => {
  form.tags.splice(form.tags.indexOf(tag), 1);
}
const originalFormData = {
  title: props.post.title,
  slug: props.post.slug,
  body: props.post.body,
  excerpt: props.post.excerpt,
  categories: [...props.categories.map(category => category.id)],
  tags: [...props.tags],
  thumbnail: props.post.thumbnail
};

const formHasChanged = computed(() => {
  return (
      form.title !== originalFormData.title ||
      form.slug !== originalFormData.slug ||
      form.body !== originalFormData.body ||
      form.excerpt !== originalFormData.excerpt ||
      form.thumbnail !== originalFormData.thumbnail ||
      JSON.stringify(form.categories) !== JSON.stringify(originalFormData.categories) ||
      JSON.stringify(form.tags) !== JSON.stringify(originalFormData.tags)
  );
});

watch(formHasChanged, (changed) => {
  formUI.noChanges = !changed; // Set noChanges to true if there are no changes
});
const onFileChange = (event) => {
  const file = event.target.files[0]
  if (file) {
    form.thumbnail = file
    formUI.fileName = file.name;
    const fileReader = new FileReader()
    fileReader.addEventListener('load', () => {
      formUI.thumbnailPreview = fileReader.result
    })
    fileReader.readAsDataURL(file)
  }
  console.log(file)
}
</script>


<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <NavLink class="font-semibold text-xl text-gray-800 leading-tight" href="/admin/blog">Blog</NavLink>
        >
        <NavLink class="font-semibold text-xl text-gray-800 leading-tight" :href="`/admin/blog/post/${post.slug}`">{{ post.title }}</NavLink>
        > Edit
      </h2>

    </template>
    <section class="my-6 mx-auto px-4 sm:px-6 max-w-7xl md:px-8">

      <form @submit.prevent="submitForm">
        <div class="flex flex-col gap-4 md:flex-row ">
          <div class="flex flex-col gap-4 w-3/4">
            <input type="text" class="border border-gray-500" v-model="form.title" placeholder="Title"/>
            <input @focusout="handleFocusOut" type="text" class="border border-gray-500" v-model="form.slug" placeholder="Slug"/>
            <input @focusout="handleFocusOut" type="text" class="border border-gray-500" v-model="form.excerpt" placeholder="Excerpt"/>
            <editor @focusout="handleChange" initial-content="Enter Blog Text" v-model="form.body"></editor>
            <div class="w-1/4">
              <primary-button :disabled="formUI.noChanges" @click.prevent="submitForm">Save Updates</primary-button>
            </div>
          </div>
          <hr class="md:hidden"/>
          <div class="flex flex-col gap-4  mx-auto w-1/4">
            <card title="Categories">
              <div class="flex items-center" :key="category.id" v-for="category in allCategories">
                <input type="checkbox" :value="category.id" v-model="form.categories"/>
                <label class="ml-1" :for="category.name">{{ category.name }}</label>
              </div>
              <div class="mt-2">
                <div class="flex" v-if="formUI.newCategory">
                  <input class="w-3/4" type="text" v-model="newCategoryContent"/>
                  <primary-button>Save Category</primary-button>
                </div>
                <button @click.prevent="formUI.newCategory = !formUI.newCategory">{{ buttonText }}</button>
              </div>
            </card>
            <card title="Tags">
              <ul class="flex mb-4 flex-wrap">
                <base-tag v-for="tag in form.tags" :tag="tag" key="tag.name">
                  <button class="ml-2 " @click.prevent="removeTag(tag)">
                    <font-awesome-icon class="w-1/2" size="lg" :icon="faClose"></font-awesome-icon>
                  </button>
                </base-tag>
              </ul>
              <tag-form @pushToTags="handlePushToTags"></tag-form>
              <!--            <primary-button @click="handleSaveTag" class="mt-4" v-if="formUI.newTag">Save tag<span v-if="form.tags.length > 1">s</span>-->
              <!--            </primary-button>-->
            </card>
            <card title="Featured Image">

              <img :src="formUI.thumbnailPreview" v-if="formUI.thumbnailPreview"/>
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
            </card>
          </div>


        </div>
      </form>
    </section>
  </AuthenticatedLayout>
</template>