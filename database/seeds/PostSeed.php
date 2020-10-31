<?php

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 16)->create()->each(function ($post) {
            $post->comments()->saveMany(factory(Comment::class, rand(1, 3))->make());
        });
    }
}
