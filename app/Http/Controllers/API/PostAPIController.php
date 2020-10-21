<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostAPIController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return response()->json(PostResource::collection($posts));
    }

    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->all());

        return response()->json(new PostResource($post));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return response()->json(new PostResource($post));
    }
}
