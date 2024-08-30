

export function useCountChars(amt, item): number{
    if (item)
    {
        return amt - item.length;

    }
    return amt;



}