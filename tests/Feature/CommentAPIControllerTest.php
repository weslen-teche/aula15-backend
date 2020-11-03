<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use PostSeed;
use Tests\TestCase;

class CommentAPIControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PostSeed::class);
    }

    public function testCreateCommentPost()
    {
        $post = Post::all()->random();

        $data = [
            'text' => $this->faker->text(30),
        ];

        $response = $this->postJson(route('api.posts.comments.store', $post->id), $data);
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonStructure(['text', 'createdAt']);
    }

    public function testCreateCommentPostNotExists()
    {
        $maxId = Post::all()->max('id');

        $data = [
            'text' => $this->faker->text(30),
        ];

        $response = $this->postJson(route('api.posts.comments.store', ($maxId + 1)), $data);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJsonStructure(['message']);
    }

    public function testCreateCommentPostWithoutText()
    {
        $post = Post::all()->random();

        $data = [];

        $response = $this->postJson(route('api.posts.comments.store', $post->id), $data);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonStructure(['message', 'errors']);
    }
}
