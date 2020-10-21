@extends('layout.app')

@section('content')
    <div class="row py-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title border-bottom pb-2">{{$post->title}}</h3>
                    <p class="card-text">{{$post->description}}</p>

                    <form method="POST" action="{{route('posts.comments.store', $post->id)}}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="text" id="text" rows="3" placeholder="Deixe seu comentário"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">Enviar</button>
                    </form>

                    <h5 class="my-4"><span class="h3">
                        {{$post->comments->count()}}</span>
                        @if ($post->comments->count() == 1)
                            comentário
                        @else
                            comentários
                        @endif
                    </h5>

                    <ul class="list-unstyled">
                        @foreach ($post->comments as $comment)
                        <li class="media border-top pt-3">
                            <div class="media-body">
                                <h6><strong>Anônimo - {{$comment->created_at->formatLocalized('%A %d de %B de %Y')}}</strong></h6>
                                <p>{{$comment->text}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
