import {computed} from "vue";
import {Project} from "@/types/project";

export function useBackgroundImage() {
    const backgroundImage = (imgArr = []) => {
        if (Array.isArray(imgArr) && imgArr.length > 0 && imgArr[0]?.img_src) {
            return `background-image: url('/storage/${imgArr[0].img_src}');`;
        } else {
            return "background-image: url('/images/no-image.jpg');";
        }
    };
    return {backgroundImage};
}