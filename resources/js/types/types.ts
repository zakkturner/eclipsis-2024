export interface Announcement {
    id: number;
    body: string;
    is_visible: boolean;
}

export interface Service {
    id?: number;
    title: string;
    description: string;
    is_visible: boolean;
}

export interface BreadCrumb {
    title: string;
    link?: string;
}

export interface Client {
    id: number;
    company: string;
    name: string;
    email: string;
    website_url?: string;
    budget?: string;
    phone?: string;
    address?: string;
    owner_birthday?: string;
    twitter?: string;
    linkedin?: string;
    instagram?: string;
    notes?: string;
}

export interface BasePhoto {
    id: number;
    img_src: string;
    created_at: string;
    updated_at: string;
    alt?: string;
}
