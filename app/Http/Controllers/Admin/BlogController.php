<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class BlogController extends Controller
{
    //

    public function index(Request $request)
    {

        $tag = $request->query('tag');
        $selectedTag = null;
        if ($tag) {
            $posts = Post::whereHas('tags', function ($query) use ($tag) {
                $query->where('id', $tag);
            })->get();
            $selectedTag = Tag::find($tag);
        } else {
            $posts = Post::all();
        }
        $categories = Category::all();
        $tags = Tag::all();


        return Inertia::render('Admin/Blog/Index',
            ['posts' => $posts, 'tags' => $tags, 'categories' => $categories, 'selectedTag' => $selectedTag]);
    }


}
