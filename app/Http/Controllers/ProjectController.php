<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Projects = Project::with('services')->get();
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::with('services')->with('case_studies')->with('client')->with('project_photos')->find($id);
        $similar_projects = Project::whereHas('services', function ($query) use ($project) {
            $query->whereIn('services.id', $project->services->pluck('id'));
        })
            ->where('id', '!=', $project->id)->with('services') // Exclude the current project
            ->take(3)
            ->get();

        return Inertia::render('Projects/Show', [
            'project' => $project,
            'similar_projects' => $similar_projects
        ]);
    }


}
