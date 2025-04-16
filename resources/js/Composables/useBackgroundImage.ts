import {computed} from "vue";
import {Project} from "@/types/project";

export function useBackgroundImage() {
    const backgroundImage = (imgArr = []) => {
        if (Array.isArray(imgArr) && imgArr.length > 0 && imgArr[0]?.img_src) {
            const featured = imgArr.find(img => img.position === 'featured');
            const image = featured || imgArr[0];
            return `background-image: url('/storage/${image.img_src}');`;
        } else {
            return "background-image: url('/images/no-image.jpg');";
        }
    };
    return {backgroundImage};
}