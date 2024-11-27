import {computed} from "vue";

export function useIsShow(route, expectedRoute) {
    const isShow = computed(() => {
        return route == expectedRoute;
    });
    return {isShow}
}