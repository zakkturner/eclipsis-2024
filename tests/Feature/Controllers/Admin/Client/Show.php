<?php

namespace Controllers\Admin\Project;

use App\Http\Controllers\ProjectController;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class Show extends TestCase
{
    public function test_edit_returns_200_and_renders_component()
    {
        $user = User::factory()->create();
        $project = Project::factory()->create();
        $response = $this->actingAs($user)->get('admin/projects/' . $project->id . '/edit/')
            ->assertInertia(fn(Assert $page) => $page
                ->component('Admin/Projects/Edit')
            );
    }

    public function test_user_can_update_project()
    {
        $user = User::factory()->create();
        $client = Client::factory()->create();
        $project = Project::factory()->create();
        $response = $this->actingAs($user)->put('admin/projects/' . $project->id, [
            'client_id' => $client->id,
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ])->assertStatus(200);

        $project->refresh();
        $this->assertEquals('Updated Title', $project->title);
    }
}
