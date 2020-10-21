<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->comments()->create($request->all());

        Session::flash('message', 'Comentário adicionado com sucesso!');
        Session::flash('alert-class', 'alert-success');

        $posts = Post::orderBy('id', 'DESC')->get();

        return redirect()->route('posts.index')->with(compact('posts'));
    }
}
