<nav class="navbar navbar-expand-lg mb-5 barraNav">
    <div class="container-fluid justify-content-center">
        <a class="navbar-brand logo" href="{{ route('home') }}"><img src="{{ asset("logo/metapop.png") }}" style="height:3.6em"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <ul class="d-lg-flex">
                    <li class="mt-3 mt-lg-0 d-flex"><a class=" crearAnuncio btn btn-success text-white mx-lg-3" href="{{ route('ads.create') }}">{{__('Crear anuncio') }}</a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle categorias" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('Categorías') }}</a>
                        <ul class="dropdown-menu  navCategorias" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" href="{{ route('category.ads', $category) }}">{{ __($category->name) }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    
                    <li>@guest
                        @if (Route::has('login'))
                                <a class=" enter btn btn-outline-secondary mx-lg-3 mt-3 mt-lg-0" href="{{ route('login') }}"><span>{{__('Entrar') }}</span></a>
                        @endif
                        
                        @else
                        <ul>
                            <li class="nav-item dropdown mt-3 mt-lg-0">
                                <a class="nav-link dropdown-toggle usuario" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }} 
                                </a>
                            <ul class="dropdown-menu navRevisor" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->is_admin)
                                    <li>
                                        <a href="{{ route('admin.home') }}" class="dropdow-item">
                                            {{__('Administrador') }}
                                            <span class="badge rounded-pill bg-danger">
                                                {{ \App\Models\Ad::ToBeRevisionedCount() }}
                                            </span>
                                        </a>
                                    </li>
                                @endif
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
                    @endguest</li>
                    <li class="mt-3 mt-lg-0"><div class="rounded-circle d-flex align-items-center">
                        <x-locale lang="en" country="gb"/>
                        <x-locale lang="it" country="it"/>
                        <x-locale lang="es" country="es"/>
                    </div></li>
                    <li class="mt-3 mt-lg-0">    <form action="{{route('search')}}" method="GET" class="d-flex buscador" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="q">
                        <button class="btn botonBuscador" type="submit"><i class="bi bi-search"></i></button>
                        </form></li>
                </ul>
            </div>
        </div>
    </div>

</nav>