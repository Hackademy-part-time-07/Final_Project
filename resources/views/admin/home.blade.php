<x-layout>
    {{-- <x-slot name = 'title'>Revisor Home</x-slot> --}}
    <h1>Administrar anuncios</h1>
    @if ($ad)
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="card formularios">
                    <div class="card-header">
                        {{__('Anuncio') }} {{ $ad->id }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{ __('Imágenes') }}</b>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    @forelse ($ad->images as $image )
                                        <div class="col md-4">
                                            <img src="{{ $image->getUrl(400,300) }}" class="img-fluid" alt="...">
                                        </div>
                                    @empty
                                        <div class="col 12">
                                            <b>{{ __('No hay imágenes') }}</b>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-3">
                                <b>{{__('Usuario') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->user->id }} - {{ $ad->user->name }} - {{ $ad->user->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Título') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->title }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Precio') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->price }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Descripción') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->body }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Categoría') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->category->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Fecha de creación') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->created_at }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <form action="{{ route('revisor.ad.accept', $ad) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success">{{__('Aceptar') }}</button>
                        </form>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <form action="{{ route('revisor.ad.reject', $ad) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger">{{__('Rechazar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <h3 class="text-center">{{__('No hay anuncios para revisar, vuelve más tarde, gracias') }}</h3>
    @endif

    <h1>Administrar usuarios y revisores</h1>

<h2>Usuarios y Revisores</h2>
<table>
<ul class="row text-center">
    @foreach ($users as $user)
        <li class="my-3">
            {{ $user->name }} - {{ $user->email }}
            @if ($user->is_revisor)
                (Revisor)
                <form action="{{ route('admin.users.remove_reviewer', $user->id) }}" method="POST">
                    @csrf
                    <button class="my-2 btnAdm" type="submit">Quitar Revisor</button>
                </form>
            @else
                (Usuario)
                <div class="d-flex justify-content-center align-items-center">
                    <form action="{{ route('admin.users.assign_reviewer', $user->id) }}" method="POST">
                        @csrf
                        <button class="my-2 mx-1 btnAdm" type="submit">Asignar Revisor</button>
                    </form>
                </div>
            @endif
            <div>
                <form action="{{ route('admin.delete', $user->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btnAdm mx-1" onclick="return confirm('¿Estás seguro de que deseas eliminar a este usuario?')">Eliminar usuario</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>

</x-layout>










