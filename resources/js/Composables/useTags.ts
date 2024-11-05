import {Tag} from "@/types/post";
import {InertiaForm} from "@inertiajs/vue3";
import {ref, Ref} from "vue";

export function useTags(initialTags: Tag[]) {
    // form.tags.push(newTag)
    // formUI.newTag = true;
    const tags = ref<Tag[]>([...initialTags]);

    const addTag = (newTag: Tag) => {
     
        tags.value.push(newTag)

    }
    const removeTag = (tag: Tag, route = 'update') => {

        // const index = tags.value.findIndex((t) => t.id === tag.id);
        const index = tags.value.indexOf(tag);

        if (index > -1) tags.value.splice(index, 1);

    };
    return {
        tags,
        addTag,
        removeTag,
    };
}
