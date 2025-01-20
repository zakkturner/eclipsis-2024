<?php

namespace Controllers\Admin\Client;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Index extends TestCase
{
    use RefreshDatabase;

    public function test_returns_clients_and_200()
    {
        $user = User::factory()->create();
        $client = Client::factory(5)->create();
        $this->assertCount(5, Client::all());
        $response = $this->actingAs($user)->get('admin/clients')->assertStatus(200);
        $response->assertJsonCount(5, 'clients');
    }
}
