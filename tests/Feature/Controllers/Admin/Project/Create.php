<?php

namespace Controllers\Admin\Project;

use App\Http\Controllers\Admin\AdminProjectController;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class Create extends TestCase
{

    use RefreshDatabase;


    public function test_create_url_returns_200_and_component()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/admin/projects/create')
            ->assertInertia(fn(Assert $page) => $page
                ->component('Admin/Projects/Create')
            );
    }

    public function test_user_can_create_project()
    {
        $user = User::factory()->create();
        $client = Client::factory()->create();
        $response = $this->actingAs($user)->post('/admin/projects', [
            'client_id' => $client->id,
            'title' => 'Projects Title',
            'description' => 'Projects Description',
        ]);
        $this->assertDatabaseHas('projects', [
            'title' => 'Projects Title',
            'description' => 'Projects Description',
        ]);
    }
}
