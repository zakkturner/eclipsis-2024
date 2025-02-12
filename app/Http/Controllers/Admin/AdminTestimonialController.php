<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class AdminTestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonials::with("client")->all();

        return Inertia::render('Admin/Testimonials/Index', [
            'testimonials' => $testimonials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Testimonials/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $attr = $request->validate([
            'name' => 'required|nullable',
            'body' => 'required|min:3',
            'client_id' => 'required|exists:clients,id',
            'avatar' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);
        $validatedPhoto['img_src'] = request()->file('img_src')->store('project_photos', 'public');
        $newTestimonial = Testimonial::create($attr);
        return Inertia::render('Admin/Testimonials/Show', [
            'testimonial' => $newTestimonial
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Inertia::render('Admin/Testimonials/Show',
            [
                'testimonial' => Testimonial::find($id)
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return Inertia::render('Admin/Testimonials/Edit', [
            'testimonial' => Testimonial::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        $attr = $request->validate([
            'name' => 'required|nullable',
            'body' => 'required|min:3',
            'client_id' => 'required|exists:clients,id'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        Testimonial::destroy($id);
    }
}
