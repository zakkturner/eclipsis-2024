<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all();
        return Inertia::render('Admin/Announcements/Index', ['announcements',$announcements]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      return  Inertia::render('Admin/Announcements/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $announcement = Announcement::create(
           $request->validate([
           'is_visible' => 'required',
           'body' => 'required|max:150',

       ]));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
