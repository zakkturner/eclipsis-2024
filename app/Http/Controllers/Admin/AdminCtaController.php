<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PhotoRequest;
use App\Models\Cta;
use App\Http\Controllers\Controller;
use App\Models\CTAFormSubmission;
use App\Models\CtaPhoto;
use App\Models\ProjectPhoto;
use App\Services\PhotoService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminCtaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ctas = Cta::withCount('ctaFormSubmissions')->get();

        return Inertia::render('Admin/CTA/Index', ['ctas' => $ctas]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/CTA/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PhotoRequest $photoRequest, PhotoService $photoService)
    {

        $attr = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'body' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url|max:255',
            'background_color' => 'nullable|string|max:50',
            'text_color' => 'nullable|string|max:50',
            'is_active' => 'boolean',
        ]);
        $cta = Cta::create($attr);
        if (isset($request['img_src'])) {
            $validatedPhoto = validator(
                [
                    'img_src' => $request->file('img_src'),
                    'alt' => $request->input('alt'),
                    'active' => $request->input('active'),
                    'position' => $request->input('position')
                ],
                (new PhotoRequest())->rules()
            )->validate();
            $photoService->add(
                $validatedPhoto,
                $cta->id,
                CtaPhoto::class,
                'cta_photos',
                'cta_id',
                $request->file('img_src')
            );
        }

        return redirect()->route('admin.ctas.index')->with('success', 'CTA created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cta $cta)
    {
        $form_submissions = $cta->ctaFormSubmissions();
        return Inertia::render('Admin/CTA/Show', ['cta' => $cta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cta $cta)
    {
        return Inertia::render('Admin/CTA/Edit', ['cta' => $cta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cta $cta, PhotoService $photoService)
    {


        $attr = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'body' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url|max:255',
            'background_color' => 'nullable|string|max:50',
            'text_color' => 'nullable|string|max:50',
            'is_active' => 'boolean',
        ]);
        $cta->update($attr);
        return redirect()->route('admin.ctas.index')->with('success', 'CTA updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cta $cta)
    {
        $cta->delete();
        return redirect()->route('admin.ctas.index')->with('success', 'CTA deleted successfully.');
    }

    private function deactivateCTAs($request)
    {
        if ($request['is_active']) {
            $ctas = Cta::where('is_active', true)->get();
            foreach ($ctas as $cta) {
                $cta->is_active = false;
                $cta->save(); // You need this to persist the change
            }
        }
    }
}
