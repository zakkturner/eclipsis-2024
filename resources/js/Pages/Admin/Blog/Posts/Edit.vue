<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import Editor from "@/Components/Form/Editor.vue";
import Card from "@/Components/UI/Card.vue";
import {useForm} from "@inertiajs/vue3";
import {computed, reactive, ref, watchEffect} from "vue";
import {Category, Post, Tag} from "@/types/post";
import {router} from "@inertiajs/vue3";
import TagForm from "@/Components/Form/TagForm.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faClose} from "@fortawesome/free-solid-svg-icons/faClose";

const props = defineProps<{
  categories: Category[];
  post: Post;
  tags: Tag[];
  allCategories: Category[]
}>()

const form = useForm({
  title: props.post.title,
  slug:  props.post.slug,
  body: props.post.body,
  excerpt: props.post.excerpt,
  categories:[...props.categories.map(category => category.id)],
  tags: [...props.tags]
})
const turnToSlug = (str: string) =>{
  return str.toString()                         // Convert to string
      .toLowerCase()                      // Convert to lowercase
      .trim()                             // Remove leading/trailing spaces
      .replace(/[\s\W-]+/g, '-')          // Replace spaces and non-alphanumeric characters with '-'
      .replace(/^-+|-+$/g, '');           // Remove leading/trailing hyphens
}

watchEffect(() => {
  if(form.title != null && form.slug !== ''){

  form.slug = turnToSlug(form.title);
  }

});
const newCategoryContent = ref(null);
const formUI = reactive({
  newCategory: false,
  newTag: false
})
const submitForm = () =>{

  router.post('/admin/blog/post', form);

}
const handleFocusOut = () =>{
  form.slug = turnToSlug(form.slug);
}



const addCategory =  () =>{
  router.post('/admin/blog/categories', newCategoryContent)
    formUI.newCategory = false;
  newCategoryContent.value = null;
}
const buttonText = computed(()=>{
  if(formUI.newCategory){
    return 'Cancel'
  }
  else {
    return 'Create New Category'
  }
})
const handleChange = () =>{
  if (form.excerpt === '') {
    // Strip HTML tags from form.body
    const plainText = form.body.replace(/<\/?[^>]+(>|$)/g, "");
    form.excerpt = plainText.substr(0, 150); // Get the first 150 characters
  }

}
const handlePushToTags = (newTag) =>{

  form.tags.push(newTag)
  formUI.newTag = true;

}
</script>



<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <NavLink class="font-semibold text-xl text-gray-800 leading-tight" href="/admin/blog">Blog </NavLink>
        >  <NavLink class="font-semibold text-xl text-gray-800 leading-tight" :href="`/admin/blog/post/${post.slug}`">{{post.title}}</NavLink> > Edit
      </h2>

    </template>
    <section class="my-6 mx-auto px-4 sm:px-6 max-w-7xl md:px-8">

    <form @submit.prevent="submitForm">
      <div class="flex flex-col gap-4 md:flex-row ">
        <div class="flex flex-col gap-4 w-3/4">
          <input type="text" class="border border-gray-500" v-model="form.title" placeholder="Title" />
          <input @focusout="handleFocusOut" type="text" class="border border-gray-500" v-model="form.slug" placeholder="Slug" />
          <input @focusout="handleFocusOut" type="text" class="border border-gray-500" v-model="form.excerpt" placeholder="Excerpt" />
          <editor @focusout="handleChange" initial-content="Enter Blog Text" v-model="form.body"></editor>
          <button class="bg-green-500 w-1/6 rounded p-4 text-white font-bold" @click.prevent="submitForm">Save Updates</button>
        </div>
        <hr  class="md:hidden"/>
        <div class="flex flex-col gap-4  mx-auto w-1/4">
          <card title="Categories">
            <div class="flex items-center" :key="category.id" v-for="category in allCategories">
              <input type="checkbox" :value="category.id" v-model="form.categories"/>
              <label class="ml-1" :for="category.name">{{ category.name }}</label>
            </div>
              <div class="mt-2">
                  <div class="flex" v-if="formUI.newCategory">
                    <input class="w-3/4" type="text" v-model="newCategoryContent" />
                    <button class="bg-eclipsis-navy w-1/4 text-eclipsis-gold font-bold" @click.prevent="addCategory">Save</button>
                  </div>
                  <button @click.prevent="formUI.newCategory = !formUI.newCategory">{{ buttonText }}</button>
              </div>
          </card>
          <card title="Tags">
            <ul class="flex mb-4 flex-wrap">
              <li class="rounded-3xl bg-gray-200 p-2 mr-2 mb-2 flex items-center" v-for="tag in form.tags">
                {{tag}}
                <button class="ml-2">
                  <font-awesome-icon :icon="faClose"></font-awesome-icon>
                </button>
              </li>
            </ul>
              <tag-form @pushToTags="handlePushToTags"></tag-form>
            <button class="" v-if="formUI.newTag">Save tag<span v-if="form.tags.length > 1">s</span> </button>
          </card>
          <card title="Featured Image">
<!--            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline process on how to certify for your weekly benefits:</p>-->
          </card>
        </div>



      </div>
    </form>
    </section>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>