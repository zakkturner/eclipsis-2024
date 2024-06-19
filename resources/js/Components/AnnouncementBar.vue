<script lang="ts" setup>
import {Announcement} from "@/types";

const props = defineProps<{
  announcement: Announcement
}>();

</script>

<template>
<div class="bg-eclipsis-navy">
    <div class="flex justify-between items-center">
        <div>

            <h6 class="text-white" v-if="announcement">{{announcement.body}}</h6>
        </div>
        <div class="flex">
            <div>Phone</div>
            <ul>
                <li><a href="https://twitter.com/eclipsisdev"><span>Twitter</span></a></li>
                <li><a href="https://www.facebook.com/eclipsisstudiosllc"><span>Facebook</span></a></li>
                <li><a href="https://www.instagram.com/eclipsisstudios/"><span>Instagram</span></a></li>
            </ul>
        </div>
    </div>

</div>
</template>

<style scoped>

</style>
