export interface  Post{
    id: number;
    category: Category;
    user_id: number;
    title: string;
    thumbnail: string;
    slug: string;
    excerpt: string;
    body: string;
    published_at: Date;
    created_at: Date;
    updated_at: Date;
}

export interface Category{
    id: number;
    name: string;
}

export interface Tag{
    id: number;
    name: string;
}