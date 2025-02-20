<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use App\Models\Category;
use App\Models\Client;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectPhoto;
use App\Models\Service;
use App\Models\Tag;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $clients = Client::all();
        $services = Service::all();
        $projects = Project::factory(8)->recycle($clients)->recycle($services)->create();
        $case_studies = CaseStudy::factory(5)->create();
        foreach ($projects as $project) {
            $serviceIds = $services->random(rand(1, 6))->pluck('id');
            $project_photos = ProjectPhoto::factory(3)->for($project)->create();
            $project->services()->attach($serviceIds);
        }

    }
}
