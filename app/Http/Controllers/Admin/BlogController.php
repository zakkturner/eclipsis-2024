<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Inertia\Inertia;
use App\Models\Post;
class BlogController extends Controller
{
    //

    public function index(){

        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::latest()->paginate(10);


        return Inertia::render('Admin/Blog/Index', ['posts' => $posts, 'tags' => $tags, 'categories' => $categories]);
    }


}
