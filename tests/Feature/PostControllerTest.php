<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PostSeed;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PostSeed::class);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testViewPostsIndex()
    {
        $posts = Post::orderBy('id', 'DESC')->get();

        $response = $this->get(route('posts.index'));

        $response->assertStatus(200);
        $response->assertViewHas('posts', $posts);
    }
}
