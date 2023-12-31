<x-layout>
    <x-slot name="title">Metapop - {{__('Iniciar sesión') }}</x-slot>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="Sesion col-9 col-md-4 col-lg-3 row text-center">

                <h2 class="form-title space-around">{{__('Iniciar sesión') }}</h2>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="/login" method="POST" role="form" class="form-control formularios">
                    @csrf
                    <div class="space-around my-2">
                        <input type="email" name="email" id="email" class="form-control forms_field-input" placeholder="{{__('Tu correo') }}" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="space-around my-2">
                        <input type="password" name="password" id="password" class="form-control forms-field-input" placeholder="{{__('Tu contraseña') }}">
                        <div class="validate"></div>
                    </div>
                    <button type="submit" class="btn btn-info">
                        {{__('Entrar') }}
                    </button>
                </form>

                <p class="my-3">{{__('¿Aún no eres de los nuestros?') }} <a href="{{ route('register') }}" class="btn btn-info btn-sm ms-2">{{__('Registrate!') }}</a></p>
            </div>
        </div>
    </div>
</x-layout>
