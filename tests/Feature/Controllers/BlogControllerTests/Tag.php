<?php

namespace Tests\Controllers\BlogControllerTests;

use App\Http\Controllers\BlogController;
use PHPUnit\Framework\TestCase;

class Tag extends TestCase
{
    public function test_blog_tags_url_returns_200()
    {
        $tag = Tag::factory()->create();
        $response = $this->get("/blog/tag/" . $tag);
    }
}
