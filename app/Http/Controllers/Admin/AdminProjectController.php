<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::with('client', 'services')->get();


        return Inertia::render('Admin/Projects/Index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Projects/Create', ['clients' => Client::all(), 'services' => Service::all()]);
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
            'services' => 'array|nullable',
            'services.*' => 'integer|exists:services,id',
        ]);
        $services = $attr['services'];
        unset($attr['services']);

        $project = Project::create($attr);

        $project->services()->attach($services);
        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return Inertia::render('Admin/Projects/Show', [
            'project' => $project,
            'project_photos' => $project->project_photos()->get(),
            'client' => $project->client()->get()->first(),
            'project_services' => $project->services()->get(),
            'services' => Service::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $project->load(['services', 'client', 'project_photos']);

        return Inertia::render('Admin/Projects/Edit', [
            'project' => $project,
            'project_photos' => $project->project_photos,
            'client' => $project->client,
            'clients' => Client::all(),
            'services' => $project->services,
            'allServices' => Service::all()

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
            'services' => 'array',
            'services.*' => 'integer|exists:services,id'
        ]);
        unset($attr['services']);
        $project->update($attr);
        $project->services()->sync($request->input('services', []));
        $project->save();
        return redirect()->route('admin.projects.index')->with(["message" => "Project updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->delete();
        return redirect()->route('admin.projects.index', ['projects' => Project::all()])->with(["message" => "Projects deleted successfully"]);
    }
}
