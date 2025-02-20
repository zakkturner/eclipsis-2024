<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
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
        $testimonials = Testimonial::with("client")->get();

        return Inertia::render('Admin/Testimonials/Index', [
            'testimonials' => $testimonials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return Inertia::render('Admin/Testimonials/Create', ['clients' => $clients]);
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
        $attr['avatar'] = request()->file('avatar')->store('testimonials', 'public');
        $newTestimonial = Testimonial::create($attr);
        return redirect()->route('admin.testimonials.show', $newTestimonial->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return Inertia::render('Admin/Testimonials/Show',
            [
                'testimonial' => Testimonial::with([
                    'client:id,name,company'
                ])->find($id)
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return Inertia::render('Admin/Testimonials/Edit', [
            'testimonial' => Testimonial::with('client')->find($id),
            'clients' => Client::all()
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
            'client_id' => 'required|exists:clients,id',
            'avatar' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);
        $oldAvatar = $testimonial->avatar;
        if ($request->hasFile('avatar')) {
            $attr['avatar'] = request()->file('avatar')->store('testimonials', 'public');
            // Optionally delete old avatar
            if ($oldAvatar && \Storage::disk('public')->exists($oldAvatar)) {
                \Storage::disk('public')->delete($oldAvatar);
            }
        } else {
            // Keep the existing avatar if no new one is uploaded
            $attr['avatar'] = $testimonial->avatar;
        }
        $testimonial->update($attr);
        return redirect()->route('admin.testimonials.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {

        $testimonial->delete();
        return redirect()->route('admin.testimonials.index', ['message' => "Testimonial deleted successfully"]);
    }
}
