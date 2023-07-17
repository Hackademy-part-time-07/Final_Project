<x-layout>
    <x-slot name='title'></x-slot>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{__('Últimos anuncios') }}</h1>
            </div>
        </div>
        <div class="row">
            @forelse ($ads as $ad)
            <div class="col-12 col-md-4">
                <div class="card mb-5 anuncios">
                    @if ($ad->images()->count() > 0)
                        <img src="{{ Storage::url($ad->images()->first()->path) }}" class="card-img-top" alt="...">
                    @else
                        <img src="https://via.placeholder.com/150" alt="..." class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>
                        <h6 class="card-subtitle mb-2">{{ $ad->price }}</h6>
                        <p class="card-text">{{ $ad->body }}</p>
                        <div class="card-subtitle mb-2">
                            <strong><a class="categoriaCard" href="{{ route('category.ads', $ad->category) }}">{{ __($ad->category->name) }}</a></strong>
                            <i>{{ $ad->created_at->format('d/m/Y') }}</i>
                        </div>
                        <div class="card-subtitle mb-2">
                            <small>{{ $ad->user->name }}</small>
                        </div>
                        <a href="{{ route('ads.show', $ad) }}" class="btn btn-primary mostrarMas">{{__('Mostrar Más') }}</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <h2>{{__('Parece que no hay ningun anuncio') }}</h2>
                <a href="{{ route('ads.create') }}" class="btn btn-success">{{__('Vende tu primer objeto') }}</a>
            
            @endforelse
        </div>
    </div>
    
</x-layout>