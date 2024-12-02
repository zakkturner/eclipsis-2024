import {BasePhoto, Client} from "@/types/types";

export interface Project {
    id: number;
    client: Client;
    title: string;
    description: string;
    launch_date: Date;
    website_url: string;
}

export interface ProjectPhoto extends BasePhoto {
    project_id: number;
}