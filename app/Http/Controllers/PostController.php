<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();

        return view('pages.posts.index')->with(compact('posts'));
    }

    public function store(PostStoreRequest $request)
    {
        Post::create($request->all());
        Session::flash('message', 'Post criado com sucesso!');
        Session::flash('alert-class', 'alert-success');

        $posts = Post::orderBy('id', 'DESC')->get();

        return redirect()->route('posts.index')->with(compact('posts'));
    }

    public function create()
    {
        return view('pages.posts.create');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('pages.posts.show')->with(compact('post'));
    }
}
