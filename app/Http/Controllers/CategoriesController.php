<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke($category)
    {
        $posts = Post::whereHas('tags', function ($query) use ($category) {
            $query->where('name', $category);
        })->with('tags')->get();
        $latest_posts = Post::latest()->limit(5)->get();
        $tags = Tag::all();

        return Inertia::render('Blog/Category/Index', [
            "posts" => $posts,
            "latest_posts" => $latest_posts,
            "tags" => $tags,
            "category" => $category,
        ]);
    }


}
