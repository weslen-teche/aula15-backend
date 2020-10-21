<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Resources\CommentResource;
use App\Models\Post;

class CommentAPIController extends Controller
{
    public function index($id)
    {
        $post = Post::findOrFail($id);

        return response()->json(CommentResource::collection($post->comments));
    }

    public function store(CommentStoreRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $comment = $post->comments()->create($request->all());

        return response()->json(new CommentResource($comment));
    }
}
