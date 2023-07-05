<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Pricing</a>
            <a class="nav-link disabled">Disabled</a>
            </div>
        </div>
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><span>Entrar</span></a>
                </li>
            @endif
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><span>Registrar</span></a>
                </li>
            @endif
            @else
            <a class="btn btn-info" href="{{ route('ads.create') }}">Crear anuncio</a>
            <li class="nav-item">
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
                </form>
                <a id="logoutBtn" class="nav-link" href="#">Salir</a>
            </li>
        @endguest
    </div>
</nav>