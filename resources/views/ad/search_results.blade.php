<x-layout>
    <x-slot name='title'>{{ $q }}</x-slot> 
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{__('Resultados de esta búsqueda') }}: {{ $q}}</h1>
            </div>
        </div>
        <div class="row">
            @forelse ($ads as $ad)
            <div class="col-12 col-md-4">
                <div class="card mb-5 anuncios">
                    @if ($ad->images()->count() > 0)
                        <img src="{{ Storage::url($ad->images()->first()->path) }}" class="card-img-top" alt="...">
                    @else
                        <img src="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150' }}" alt="..." class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>
                        <h6 class="card-subtitle mb-2">{{ is_float($ad->price) ? number_format($ad->price, 2) : number_format($ad->price) }}€</h6>
                        <a href="{{ route('ads.show', $ad) }}" class="btn btn-primary mostrarMas">{{__('Mostrar Más') }}</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <h2>{{__('Uyy.. parece que no se han encontrado resultados') }}</h2>
            </div>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary">{{__('Vuelve a la Home') }}</a>
            </div>
            @endforelse
        </div>
        
    </div>
    @includeIf('components.footer')
</x-layout>