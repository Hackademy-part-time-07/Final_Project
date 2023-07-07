<nav class="navbar navbar-expand-lg mb-5 barraNav">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="#"><strong>{{ env('APP_NAME') }}</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <ul>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle categorias" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorías</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" href="{{ route('category.ads', $category) }}">{{ $category->name }}</a></li>
                            @endforeach
                </ul>
            <a class="nav-link active home" aria-current="page" href="{{ route('home') }}">Home</a>
            </div>
        </div>
        @guest
            @if (Route::has('login'))
                    <a class="btn btn-dark mx-3" href="{{ route('login') }}"><span>Entrar</span></a>
            @endif
            @if (Route::has('register'))
                    <a class="btn btn-info" href="{{ route('register') }}"><span>Registrar</span></a>
            @endif
            @else
            <a class="btn btn-info mx-3" href="{{ route('ads.create') }}">Crear anuncio</a>
            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
            @csrf
            </form>
            <a id="logoutBtn" class="btn btn-warning" href="#">Salir</a>
        @endguest
    </div>
</nav>