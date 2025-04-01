<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link} from "@inertiajs/vue3";
import {Service} from "@/types/types";
import {router} from "@inertiajs/vue3";
import LinkButton from "@/Components/LinkButton.vue";
import CustomTable from "@/Components/CustomTable.vue";
import {faPencil, faTrashCan} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

const {services, message} = defineProps<{
  services: Service[],
  message?: string
}>();


const destroy = (id) => {
  router.delete(`/admin/services/${id}`)
}
const tableHeadings = [
  'body',
  'description',
  'active?',
  'Actions'
]
</script>

<template>
  <Head title="Services"/>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Services</h2>
    </template>

    <div class="py-12">

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6">
            <div class="flex w-full justify-end mb-10">
              <link-button class="bg-green-500 px-4 py-2 text-2xl rounded-full text-white border-4 border-green-500 hover:bg-white hover:text-black
              transition-all
              ease-in-out" as="button" type="button" link="/admin/services/create"> Add Service
              </link-button>
            </div>

            <custom-table v-if="services.length > 0" :tableHeadings="tableHeadings">
              <template #default>

                <tr v-for="service in services" :key="service.id" class="border-eclipsis-navy border-t-2 first:border-t-0 last:border-b-2">


                  <td class="border border-eclipsis-navy p-2">
                    {{ service.title }}
                  </td>
                  <td class="border border-eclipsis-navy p-2">
                    {{ service.description }}
                  </td>
                  <td class="border border-eclipsis-navy p-2">

                    {{ service.is_visible == true ? "Visible" : "Not Visible" }}
                  </td>
                  <td class="border border-eclipsis-navy p-2">
                    <div class="flex">
                      <Link
                          class="bg-eclipsis-gold mr-2 px-4 py-2 rounded text-white border-4 border-eclipsis-gold hover:bg-white  group transition-all ease-in-out flex items-center"
                          :href="'/admin/services/' + service.id + '/edit'">
                        <span class="group-hover:text-eclipsis-gold">
                        <font-awesome-icon :icon="faPencil"></font-awesome-icon>
                        </span>
                      </Link>
                      <button @click="destroy(service.id)"
                              class="bg-red-600 px-4 py-2 rounded text-white border-4 border-red-600 hover:bg-white hover:text-black transition-all
                      ease-in-out">
                        <font-awesome-icon :icon="faTrashCan"></font-awesome-icon>
                      </button>
                    </div>
                  </td>

                </tr>


              </template>
            </custom-table>

          </div>
        </div>

      </div>
    </div>


    <div v-if="message">{{ message }}</div>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>