<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BlogController extends Controller
{
    //

    public function index(Request $request)
    {
        $posts = Post::all();
        $latest_posts = Post::latest()->limit(5)->get();
        $tags = Tag::all();
        $categories = Category::all();
        return Inertia::render('Blog/Index', [
            "posts" => $posts,
            "latest_posts" => $latest_posts,
            "tags" => $tags,
        ]);
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

    public function search(Request $request)
    {
        $query = $request->get('query');
        $latest_posts = Post::latest()->limit(5)->get();
        $categories = Category::all();
        $posts = DB::table('posts')
            ->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('body', 'LIKE', '%' . $query . '%')
            ->get();

        return Inertia::render('Blog/PostResults', [
            "posts" => $posts,
            "query" => $query,
            "tags" => Tag::all(),
            "latest_posts" => $latest_posts,
            
        ]);
    }

}
