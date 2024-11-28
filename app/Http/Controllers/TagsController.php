<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke($tag)
    {
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('name', $tag);
        })->with('tags')->get();
        $latest_posts = Post::latest()->limit(5)->get();
        $tags = Tag::all();

        return Inertia::render('Blog/Tag/Index', [
            "posts" => $posts,
            "latest_posts" => $latest_posts,
            "tags" => $tags,
            "tag" => $tag,
        ]);
    }


}
