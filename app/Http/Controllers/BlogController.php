<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function index(Request $request)
    {


    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        dd($post);
        Inertia::render('Blog/Show', ['post' => $post]);
    }

}
