<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('posts.index')}}">
            <img src="{{asset('images/logo.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="Logo" loading="lazy">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('posts.index')}}">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <a href="{{route('posts.create')}}" class="btn btn-success">
                <span class="mr-2">Novo Post</span><i class="fas fa-newspaper"></i>
            </a>
        </div>
    </div>
</nav>
