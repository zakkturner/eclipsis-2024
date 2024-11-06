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
        return Inertia::render('Blog/Show', ['post' => $post,
            'tags' => $tags]);
    }

}
