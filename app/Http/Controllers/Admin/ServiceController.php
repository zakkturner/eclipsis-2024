<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $services = Service::all();
       return Inertia::render('Admin/Services/Index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return Inertia::render('Admin/Services/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $attrs =  $request->validate([
            'title' => 'required|min:3|max:150',
            'icon' => '|min:3|max:150|nullable',
            'description' => 'nullable|max:250',
            'is_visible' => 'nullable|boolean'
        ]);

      Service::create($attrs);
      return Inertia::location(route('admin.services.index'), ['message' => 'Service created successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {

        return Inertia::render('Admin/Services/Edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $attrs =  $request->validate([
            'title' => 'required|min:3|max:150',
            'icon' => '|min:3|max:150|nullable',
            'description' => 'nullable|max:250',
            'is_visible' => 'nullable|boolean'
        ]);


        $service->save($attrs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect('/admin/services')->with('message', 'Service deleted successfully');
    }
}
