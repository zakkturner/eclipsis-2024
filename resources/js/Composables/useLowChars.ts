export function useLowChars (amt: number, item: string, low = 5 ) {

    return  amt - item.length < low ? 'text-red-500' : '';
}


