<?php

namespace Tests\Controllers\BlogControllerTests;

use App\Http\Controllers\BlogController;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class Index extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_200()
    {
        $response = $this->get('/blog')->assertStatus(200);
    }

    public function test_index_returns_inertia_component()
    {
        $response = $this->get('/blog')->assertInertia(fn(Assert $page) => $page->component('Blog/Index'));
    }

    public function test_index_returns_inertia_component_with_posts()
    {
        $posts = Post::factory()->count(3)->create();

        $response = $this->get('/blog')->assertInertia(fn(Assert $page) => $page->component('Blog/Index')
            ->has('posts', 3)
            ->has('latest_posts', 3)
            ->has('tags')
        );
    }
}
