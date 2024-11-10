<template>
  <form>
    <div class="flex items-center bg-gray-100 p-4 rounded-lg mb-4 border border-transparent  focus-within:border-gray-900 ">
      <input type="text" placeholder="Search here..."
             class=" border-0 bg-transparent w-full focus:ring-0 focus:border-transparent focus-visible:border-transparent focus-visible:border-transparent focus-within:border-transparent focus-within:border-transparent "
      >
      <font-awesome-icon :icon="faMagnifyingGlass" size="lg"></font-awesome-icon>
    </div>
  </form>
</template>
<script>
export default {
  name: 'SearchForm'
}
</script>