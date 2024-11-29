<?php

namespace Tests\Controllers\Admin\Project;

use App\Http\Controllers\Admin\AdminProjectController;
use App\Models\Project;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Index extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_200()
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('admin/projects')->assertStatus(200);
    }

    public function test_index_returns_200_with_projects()
    {

        $user = User::factory()->create();
        $projects = Project::factory(10)->create();
        $response = $this->actingAs($user)->get('admin/projects');
        $response->assertJsonCount(10);
    }
}
