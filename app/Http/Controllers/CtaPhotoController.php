<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Models\CtaPhoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CtaPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(PhotoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CtaPhoto $ctaPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CtaPhoto $ctaPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoRequest $request, CtaPhoto $ctaPhoto)
    {
        $validatedPhoto = $request->validated();
        $ctaPhoto->update($validatedPhoto);
        return Redirect::back()->with(['message' => 'Photo successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CtaPhoto $ctaPhoto)
    {
        //
    }
}
