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
    icon?: string;
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
    status: string;
    last_contacted_at?: string | null;
    next_follow_up_at?: string | null;
    converted_at?: string | null;
    lead_source?: string;
    industry?: string;
    is_active: boolean;
    tags?: string[];
}

export interface BasePhoto {
    id: number;
    img_src: string;
    created_at: string;
    updated_at: string;
    position?: string;
    alt?: string;
}

export interface Testimonial {
    id: number;
    name: string;
    body: string;
    client: Client;
    created_at: Date;
    avatar: string;
}

export interface CtaPhoto extends BasePhoto {
    active: boolean;
}

export interface CTA {
    id: number;
    title: string;
    subtitle?: string;
    body?: string;
    button_text?: string;
    button_link?: string;
    background_color?: string;
    text_color?: string;
    is_active: boolean;
    click_count: number;
    conversion_count: number
    objective: string;
    photos?: CtaPhoto[];
    form_submissions: number
}