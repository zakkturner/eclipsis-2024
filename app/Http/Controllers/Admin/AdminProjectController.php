<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::with('client')->get();


        return Inertia::render('Admin/Projects/Index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Projects/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'client_id' => 'required|integer|exists:clients,id',
            'title' => 'string|required|min:3|max:100',
            'description' => 'string|required|min:3|max:100',
            'launch_date' => 'date|nullable',
            'website_url' => 'string|nullable',
        ]);

        Project::create($attr);
        return Inertia::render('Admin/Projects/Index', ['projects' => Project::all()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return Inertia::render('Admin/Projects/Show', [
            'project' => $project,
            'project_photos' => $project->project_photos()->get(),
            'client' => $project->client()->get()->first()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {


        return Inertia::render('Admin/Projects/Edit', [
            'project' => $project,
            'project_photos' => $project->project_photos()->get(),
            'client' => $project->client()->get()->first(),
            'clients' => Client::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $attr = $request->validate([
            'client_id' => 'required|integer|exists:clients,id',
            'title' => 'string|required|min:3|max:100',
            'description' => 'string|required|min:3|max:200',
            'launch_date' => 'date|nullable',
            'website_url' => 'string|nullable',
        ]);

        $project->update($attr);
        $project->save();
        return Inertia::render('Admin/Projects/Show', ['project' => $project])->with(["message" => "Project updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return Inertia::render('Admin/Projects/Index', ['projects' => Project::all()])->with(["message" => "Project deleted successfully"]);
    }
}
