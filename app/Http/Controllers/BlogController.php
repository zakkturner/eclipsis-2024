<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    //

    public function index(Request $request)
    {


    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $tags = $post->tags()->get();
        $categories = $post->categories()->get();
        $latest_posts = Post::where('slug', '!=', $post->slug)->latest()->limit(5)->get();
        return Inertia::render('Blog/Show', ['post' => $post,
            'tags' => $tags, 'latest_posts' => $latest_posts, 'categories' => $categories]);
    }

}
