<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all();
        return Inertia::render('Admin/Announcements/Index', ['announcements' => $announcements]);
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

        $this->remove_visible_announcements();
               $announcement = Announcement::create(
                 $this->validateAnnouncement()
               );

        return to_route("admin.announcements.index", $announcement);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $announcement = Announcement::findOrFail($id);;


        return Inertia::render('Admin/Announcements/Show',
            [
            'announcement' => $announcement
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $announcement = Announcement::findOrFail($id);

      return  Inertia::render('Admin/Announcements/Edit', ['announcement' => $announcement]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Announcement $announcement, Request $request)
    {

//        $announcement = Announcement::findOrFail($id);
        $this->remove_visible_announcements($request);
       $attributes = $this->validateAnnouncement();
      $announcement->update($attributes);


      return redirect()->route('admin.announcements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function remove_visible_announcements(Request $request): void{

        if($request->is_visible){
            foreach (Announcement::all() as $announcement){
                if($announcement->is_visible){
                    var_dump($announcement->id);
                    $announcement->is_visible = false;
                    $announcement->save();
                }
            }
        }
    }
    public function validateAnnouncement(?Announcement $announcement = null): array{
//        $announcement ??= new Announcement();
        return  request()->validate([
            'is_visible' => 'required',
            'body' => 'required|max:150',

        ]);
    }
}
