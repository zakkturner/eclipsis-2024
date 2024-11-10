import {computed} from "vue";
import dayjs from "dayjs";

type FormattedDate = {
    formattedDate: string
}

export function useFormatDate(date: Date): FormattedDate {
    const formattedDate: any = dayjs(date).format("MMMM DD, YYYY")
    return {
        formattedDate
    };
}