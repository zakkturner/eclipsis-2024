<script setup>
import {ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/vue3';
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faAddressBook, faBriefcase, faBullhorn, faChartLine, faGear, faGears, faNewspaper, faUserPen} from "@fortawesome/free-solid-svg-icons";

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div>
    <div class="min-h-screen bg-gray-100 flex">
      <nav class="bg-eclipsis-navy border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fixed h-screen bg-eclipsis-navy z-99">
          <div class="flex justify-between h-16">
            <div class="flex flex-col  h-full">
              <!-- Logo -->
              <div class=" flex justify-center mb-10">
                <Link :href="route('dashboard')">
                  <ApplicationLogo
                      class="block h-20 w-auto fill-current text-gray-800"
                  />
                </Link>
              </div>
              <hr class="border border-gray-400 mb-4">

              <!-- Navigation Links -->
              <div class="h-fit">

                <div class="hidden  sm:mb-2  sm:flex flex-col items-stretch justify-center text-center ">
                  <NavLink class="text-white" :href="route('dashboard')" :active="route().current('dashboard')">
                    <font-awesome-icon :icon="faChartLine"></font-awesome-icon>
                    Dashboard
                  </NavLink>
                </div>
                <div class="hidden  sm:mb-2  sm:flex flex-col items-stretch justify-center text-center ">
                  <NavLink :href="route('announcements.index')" :active="route().current('announcements')">
                    <font-awesome-icon :icon="faBullhorn"></font-awesome-icon>
                    Announcements
                  </NavLink>
                </div>
                <div class="hidden  sm:mb-2  sm:flex flex-col items-stretch justify-center text-center ">
                  <NavLink :href="route('admin.services.index')" :active="route().current().includes('admin.services')">
                    <font-awesome-icon :icon="faGears"></font-awesome-icon>
                    Services
                  </NavLink>
                </div>
                <div class="hidden  sm:mb-2  sm:flex flex-col items-stretch justify-center text-center">
                  <NavLink :href="route('admin.blog.index')" :active="route().current().includes('admin.blog')">
                    <font-awesome-icon :icon="faNewspaper"></font-awesome-icon>
                    Blog
                  </NavLink>
                </div>
                <div class="hidden  sm:mb-2  sm:flex flex-col items-stretch justify-center text-center">
                  <NavLink :href="route('admin.projects.index')" :active="route().current().includes('admin.projects')">
                    <font-awesome-icon :icon="faBriefcase"></font-awesome-icon>
                    Projects
                  </NavLink>
                </div>
                <div class="hidden  sm:mb-2  sm:flex flex-col items-stretch justify-center text-center">
                  <NavLink :href="route('admin.clients.index')" :active="route().current().includes('admin.clients')">
                    <font-awesome-icon :icon="faAddressBook"></font-awesome-icon>
                    Clients
                  </NavLink>
                </div>
                <div class="hidden  sm:mb-2  sm:flex flex-col items-stretch justify-center text-center">
                  <NavLink :href="route('admin.testimonials.index')" :active="route().current().includes('admin.testimonials')">
                    <font-awesome-icon :icon="faUserPen"></font-awesome-icon>
                    Testimonials
                  </NavLink>
                </div>
                <div class="hidden  sm:mb-2  sm:flex flex-col items-stretch justify-center text-center">
                  <NavLink :href="route('admin.settings')" :active="route().current().includes('admin.settings')">
                    <font-awesome-icon :icon="faGear"></font-awesome-icon>
                    Settings
                  </NavLink>
                </div>
              </div>
              <div class="hidden sm:flex flex-col items-stretch justify-center sm:items-center absolute bottom-6">
                <!-- SettingsController Dropdown -->
                <div class="ms-3 relative">
                  <Dropdown align="right" width="48">
                    <template #trigger>
                                          <span class="inline-flex rounded-md">
                                              <button
                                                  type="button"
                                                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                              >
                                                  {{ $page.props.auth.user.name }}
                                                  <svg
                                                      class="ms-2 -me-0.5 h-4 w-4"
                                                      xmlns="http://www.w3.org/2000/svg"
                                                      viewBox="0 0 20 20"
                                                      fill="currentColor"
                                                  >
                                                      <path
                                                          fill-rule="evenodd"
                                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                          clip-rule="evenodd"
                                                      />
                                                  </svg>
                                              </button>
                                          </span>
                    </template>
                    <template #content>
                      <DropdownLink :href="route('profile.edit')"> Profile</DropdownLink>
                      <DropdownLink :href="route('logout')" method="post" as="button">
                        Log Out
                      </DropdownLink>
                    </template>
                  </Dropdown>
                </div>
              </div>
              <!-- Hamburger -->
            </div>


            <div class="-me-2 flex items-center sm:hidden">
              <button
                  @click="showingNavigationDropdown = !showingNavigationDropdown"
                  class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
              >
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path
                      :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"
                  />
                  <path
                      :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
            :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
            class="sm:hidden"
        >
          <div class="pt-2 pb-3 space-y-1">
            <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
              Dashboard
            </ResponsiveNavLink>
          </div>

          <!-- Responsive SettingsController Options -->
          <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
              <div class="font-medium text-base text-gray-800">
                {{ $page.props.auth.user.name }}s
              </div>
              <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
            </div>

            <div class="mt-3 space-y-1">
              <ResponsiveNavLink :href="route('profile.edit')"> Profile</ResponsiveNavLink>
              <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                Log Out
              </ResponsiveNavLink>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Heading -->

      <!-- Page Content -->
      <main class="w-full ml-56">
        <header class="bg-white shadow w-full" v-if="$slots.header">
          <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <slot name="header"/>
          </div>
        </header>
        <slot/>
      </main>
    </div>
  </div>
</template>
