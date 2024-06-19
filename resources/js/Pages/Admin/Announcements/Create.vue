<script lang="ts"  setup>
import {ModelRef, reactive} from "vue";
import {Link, router} from "@inertiajs/vue3";


const body: ModelRef<string> = defineModel()
function countChars(){
    if (form.body)
    {
        return 150 - form.body.length;

    }
    return 150;
   // charCount = textArea.value.value.length;
}

const form = reactive({
    body: null,
    is_visible: false
});
function submit(){

    router.post('/announcements', form);
}
</script>

<template>
<div class="flex py-10 items-center h-screen">
    <div class="w-1/3 mx-auto">
        <div class="mb-4">

            <h3 class="text-3xl font-bold">
                Create Announcement
            </h3>
        </div>
        <form @submit.prevent="submit" class="mb-10">
            <div class="flex flex-col mb-4">
                <label>Body ( <span :class="{'text-red-500': countChars() < 5 }">{{countChars()}}  Characters Left </span>) </label>
                <textarea @keyup="countChars" v-model="form.body" rows="8" cols="2" maxlength="150" ></textarea>
            </div>
            <div class="flex flex-col mb-4 w-full items-end">
                <label>Active?</label>
                <input type="checkbox" name="is_visible" v-model="form.is_visible">
            </div>
<!--            <div class="flex flex-col">-->
<!--                <label>Phone</label>-->
<!--                <input type="text" name="phone">-->
<!--            </div>-->
<!--            <div class="flex flex-col">-->
<!--                <label>Facebook Url</label>-->
<!--                <input type="text" name="facebook_url">-->
<!--            </div>-->
<!--            <div class="flex flex-col">-->
<!--                <label>Twitter Url</label>-->
<!--                <input type="text" name="twitter_url">-->
<!--            </div>-->
<!--            <div class="flex flex-col">-->
<!--                <label>Instagram Url</label>-->
<!--                <input type="text" name="instagram_url">-->
<!--            </div>-->
            <button type="submit" class="bg-green-500 py-2 px-4 text-white rounded">Add Announcement</button>
        </form>

        <div class="mt-4">
            <Link class="bg-eclipsis-gold px-8 py-4 rounded text-white border-4 border-eclipsis-gold hover:bg-white hover:text-black transition-all
            ease-in-out" as="button" type="button" href="/announcements">Back To Announcements</Link>
        </div>

    </div>
</div>
</template>

<style scoped>

</style>
