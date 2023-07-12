<nav class="navbar navbar-expand-lg mb-5 barraNav">
    <div class="container">
        <a class="navbar-brand logo" href="{{ route('home') }}"><img src="{{ asset("logo/metapop.png") }}" style="height:3.6em"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <ul>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle categorias" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('Categorías') }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" href="{{ route('category.ads', $category) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <a class="btn btn-success mx-3" href="{{ route('ads.create') }}">{{__('Crear anuncio') }}</a>
        <div class="d-flex">
        @guest
            @if (Route::has('login'))
                    <a class="btn btn-dark mx-3" href="{{ route('login') }}"><span>{{__('Entrar') }}</span></a>
            @endif
            @if (Route::has('register'))
                    <a class="btn btn-info" href="{{ route('register') }}"><span>{{__('Registrar') }}</span></a>
            @endif
            @else
            <ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }} 
                    </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if (Auth::user()->is_revisor)
                        <li>
                            <a href="{{ route('revisor.home') }}" class="dropdow-item">
                                {{__('Revisor') }}
                                <span class="badge rounded-pill bg-danger">
                                    {{ \App\Models\Ad::ToBeRevisionedCount() }}
                                </span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <a id="logoutBtn" href="#">{{__('Salir') }}</a>
                    </li>
                </ul>
            </ul>
        @endguest
            <div class="d-flex">
                <x-locale lang="en" country="gb"/>
                <x-locale lang="it" country="it"/>
                <x-locale lang="es" country="es"/>
            </div>
            </div>
    </div>
</nav>