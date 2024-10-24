<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Posts;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();
        return Inertia::render('Admin/Blog/Posts/Create', [ 'tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'thumbnail' => ['nullable', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'categories' => 'required|array', // Expecting an array of category IDs
            'categories.*' => 'exists:categories,id', // Ensure each category exists in the categories table
        ]);

        $validated['user_id'] = auth()->id();
        $categories = $validated['categories'];
        unset($validated['categories']);
      $post = Post::create($validated);
        $post->categories()->sync($categories);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
      $post = Post::where('slug', $slug)->firstOrFail();

        return Inertia::render('Admin/Blog/Posts/Show', [ 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
