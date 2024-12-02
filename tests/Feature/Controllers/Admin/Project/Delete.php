<?php

namespace Controllers\Admin\Project;

use App\Http\Controllers\ProjectController;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class Delete extends TestCase
{

    use RefreshDatabase;

    public function test_user_can_update_project()
    {
        $user = User::factory()->create();

        $project = Project::factory()->create();
        $response = $this->actingAs($user)->delete('admin/projects/' . $project->id)->assertStatus(200);

        // Assert: Check that the project no longer exists in the database
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }
}
