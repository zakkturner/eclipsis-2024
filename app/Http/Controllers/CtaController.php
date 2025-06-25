<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Models\Cta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CtaController extends Controller
{

    public function click(Cta $cta)
    {
        $cta->click_count++;
        $cta->save();
    }

    public function store(StoreClientRequest $request, Cta $cta)
    {
        try {
            $validatedData = $request->validated();
            Client::create($validatedData);
            $cta->conversion_count++;
            $cta->save();
            return redirect()->back()->with(['message' => "Thank you! We'll review your information and contact you within 1–2 business days."]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
//    /**
//     * Display a listing of the resource.
//     */
//    public function index()
//    {
//        //
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(Cta $cta)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(Cta $cta)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, Cta $cta)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(Cta $cta)
//    {
//        //
//    }
}
