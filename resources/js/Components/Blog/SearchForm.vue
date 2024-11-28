<template>
  <form @submit.prevent="handleSubmit">
    <div class="flex items-center bg-gray-100 p-4 rounded-lg mb-4 border border-transparent  focus-within:border-gray-900 ">
      <input type="text" placeholder="Search here..."
             v-model="form.query"
             class=" border-0 bg-transparent w-full focus:ring-0 focus:border-transparent focus-visible:border-transparent focus-visible:border-transparent focus-within:border-transparent focus-within:border-transparent "
      >
      <font-awesome-icon :icon="faMagnifyingGlass" size="lg"></font-awesome-icon>
    </div>
  </form>
  <!--  <div ref="quickResults" class="bg-white hidden absolute w-full opacity-0  border top-16">-->
  <!--    <ul class="pt-2">-->
  <!--      <li class="border-b border-gray-200 pl-2 pb-2">Test</li>-->
  <!--      <li class="border-b border-gray-200 pl-2 pb-2">Test</li>-->
  <!--    </ul>-->
  <!--  </div>-->
</template>
<script lang="ts" setup>
import gsap from "gsap";
import {faMagnifyingGlass} from "@fortawesome/free-solid-svg-icons";
import {ref, watch} from "vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {router, useForm} from "@inertiajs/vue3";


const form = useForm({
  query: ''
});


const handleSubmit = () => {
  router.get("/blog/search", form);
}
// const quickResults = ref(null);
// watch(query, () => {
//   if (query.value !== '') {
//     gsap.to(quickResults.value, {opacity: 1, y: 5, duration: .5, css: {display: "block", opacity: 1}, ease: "expo.in"});
//   } else if (query.value === '') {
//     gsap.to(quickResults.value, {opacity: 0, y: 0, duration: .5, ease: "expo.out"})
//   }
//
// })

</script>