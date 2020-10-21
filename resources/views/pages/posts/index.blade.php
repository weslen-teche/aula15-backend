@extends('layout.app')

@section('content')
    @if (session()->has('message'))
        <div class="row mt-4">
            <div class="col">
                <div class="alert {{session()->get('alert-class')}} alert-dismissible fade show" role="alert">
                    {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
        </div>
    @endif

    @if ($posts->count() >= 1)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 py-5">
            @foreach ($posts as $post)
                <div class="col mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title border-bottom pb-2"><a href="{{route('posts.show', ['post' => $post->id])}}">{{$post->title}}</a></h3>
                            <p class="card-text">{{$post->description}}</p>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted text-center"><strong>{{$post->comments->count()}}</strong>
                            @if ($post->comments->count() == 1)
                                comentário
                            @else
                                comentários
                            @endif
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="d-flex justify-content-center align-items-center min-vh-100" style="margin-top: -55px">
            <h1 class="text-muted">Nenhum post encontrado!</h1>
        </div>
    @endif
@endsection
