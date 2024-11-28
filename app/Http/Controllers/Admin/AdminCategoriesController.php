<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminCategoriesController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $attr = $request->validate([
            '_value' => 'required|min:3',
        ]);

        Category::create(['name' => $attr['_value']]);
        $categories = Category::all();
        return Inertia::render('Admin/Blog/Posts/Create', ["message" => "Category added successfully!", 'categories' => $categories]);
    }

    /**
     * Display the specified resource.
     */
    public function show($param)
    {
        $category = Category::where('name', $param)->first();
        $posts = null;
        if ($category->posts) {
            $posts = $category->posts;

        }
        return Inertia::render('Admin/Blog/Categories/Show', ['posts' => $posts, 'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categories)
    {
        //
    }
}
