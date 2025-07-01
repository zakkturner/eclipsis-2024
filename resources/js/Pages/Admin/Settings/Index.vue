<script setup lang="ts">

import {Head, router, useForm, usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
import {computed, ref} from "vue";
import DashboardContainer from "@/Components/UI/DashboardContainer.vue";
import GeneralSettings from "@/Components/Form/Settings/GeneralSettings.vue";
import SiteContentSettings from "@/Components/Form/Settings/SiteContentSettings.vue";

const props = defineProps<{
  company_info: any;
  site_content: any;
}>()
const flash = computed(() => usePage().props.flash);
const activeTab = ref('general');
const activeStyles = "bg-gray-300 border border-gray-300 rounded-md";
</script>

<template>
  <Head title="Settings"/>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Settings</h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <DashboardContainer>
          <div class="mb-6">
            <ul class="flex">
              <li class="mr-2" :class="activeTab === 'general' && activeStyles">
                <button class="p-2" @click="activeTab = 'general'">General</button>
              </li>
              <li :class="activeTab === 'site-content' && activeStyles">
                <button class="p-2" @click="activeTab = 'site-content'">Site Content</button>
              </li>
            </ul>
          </div>
          <div>
            <general-settings :company_info="company_info" v-if="activeTab == 'general'"></general-settings>
            <site-content-settings :site_content="site_content" v-if="activeTab == 'site-content'"></site-content-settings>
          </div>
        </DashboardContainer>
        <flash-message :message="$page.props.flash.message || $page.props.flash.error"></flash-message>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>