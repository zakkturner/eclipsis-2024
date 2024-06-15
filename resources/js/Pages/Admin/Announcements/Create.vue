<script lang="ts"  setup>

import {ModelRef} from "vue";

const body: ModelRef<string> = defineModel()
function countChars(){
    if (body.value)
    {
        return 150 - body.value.length;

    }
    return 150;
   // charCount = textArea.value.value.length;
}


</script>

<template>
<div>
    <div>Create Announcement</div>
    <form>
        <div class="flex flex-col">
            <label>Body ( <span :class="{'text-red-500': countChars() < 5 }">{{countChars()}}  Characters Left </span>) {{countChars() < 5}} </label>
            <textarea @keyup="countChars" v-model="body" rows="10" cols="30" maxlength="150"></textarea>
        </div>
        <div>

            <input type="text" name="">
        </div>
    </form>
</div>
</template>

<style scoped>

</style>
