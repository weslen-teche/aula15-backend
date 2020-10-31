<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Response;

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

        return response()->json(new PostResource($post), Response::HTTP_CREATED);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return response()->json(new PostResource($post));
    }
}
