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
        return Inertia::render('Admin/Blog/Posts/Create', ['tags' => $tags, 'categories' => $categories]);
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
        $categories = $post->categories;
        $tags = $post->tags;
        return Inertia::render('Admin/Blog/Posts/Show', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = $post->categories;
        $tags = $post->tags;
        $allCategories = Category::all();
        return Inertia::render(
            'Admin/Blog/Posts/Edit',
            [
                'post' => $post,
                'categories' => $categories,
                'allCategories' => $allCategories,
                'tags' => $tags
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id); // Use findOrFail for better error handling

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'thumbnail' => ['nullable', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'categories' => 'required|array', // Expecting an array of category IDs
            'categories.*' => 'exists:categories,id', // Ensure each category exists in the categories table
            'tags' => 'array|nullable',
            'tags.*' => 'string|max:50',
        ]);
        $validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        // Create an array of attributes to update
        $attributesToUpdate = [
            'title' => $validated['title'],
            'body' => $validated['body'],
            'thumbnail' => $validated['thumbnail'] ?? null,
            'slug' => $validated['slug'],
            'excerpt' => $validated['excerpt'],
        ];

        // Update the post without the tags field
        $post->update($attributesToUpdate);
        // Sync categories
        if (isset($validated['categories'])) {
            $post->categories()->sync($validated['categories']);
        }

        // Handle tags
        if (isset($validated['tags'])) {
            $tagIds = [];
            foreach ($validated['tags'] as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id; // Collecting tag IDs
            }
            $post->tags()->sync($tagIds); // Sync the tags
        }
        return Inertia::render('Admin/Blog/Posts/Show', ['post' => $post, 'message' => "Updated Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
