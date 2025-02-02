import {BasePhoto, Client, Service} from "@/types/types";

export interface Project {
    id: number;
    client: Client;
    title: string;
    description: string;
    launch_date: Date;
    website_url: string;
    project_photos: ProjectPhoto[]
    services: Service[]
}

export interface ProjectPhoto extends BasePhoto {
    project_id: number;
    img_src: string;
    alt: string;
    created_at: string;
    updated_at: string;
    position: string;
}