export interface Announcement{
    id: number;
    body: string;
    is_visible: boolean;
}
export interface Service{
    id?:number;
    title: string;
    description: string;
    is_visible: boolean;
}

