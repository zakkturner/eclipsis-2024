<?php

namespace Controllers\BlogControllerTests;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Search extends TestCase
{
    use RefreshDatabase;

    public function test_search_post_returns_200()
    {
        $response = $this->get('/blog/search')->assertStatus(200);
    }

    public function test_search_query_returns_related_posts()
    {
        User::factory()->create();
        $relatedPost = Post::factory()->create(['title' => 'Laravel Testing']);
        $response = $this->get('/blog/search?query=Laravel');
        $response->assertStatus(200);
        $response->assertSee($relatedPost->title);
    }

}
