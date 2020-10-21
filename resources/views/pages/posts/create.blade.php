@extends('layout.app')

@section('content')
    <div class="row py-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="card-title border-bottom pb-2">Cadastrar Postagem</h3>
                    <form method="POST" action="{{route('posts.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Título">
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrição do seu post"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
