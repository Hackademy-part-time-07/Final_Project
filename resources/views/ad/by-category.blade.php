<x-layout>
    <x-slot name='title'>{{ $category->name }}</x-slot> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-sm-12">
                <h1>{{__('Anuncios por categoría') }}: {{ $category->name }}</h1>
            </div>
        </div>
        <div class="row">
            @forelse ($ads as $ad)
            <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                <div class="card mb-5 anuncios">
                    @if ($ad->images()->count() > 0)
                        <img src="{{ Storage::url($ad->images()->first()->path) }}" class="card-img-top" alt="...">
                    @else
                        <img src="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150' }}" alt="..." class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>
                        <h6 class="card-subtitle mb-2">{{ is_float($ad->price) ? number_format($ad->price, 2) : number_format($ad->price) }}€</h6>
                        <div class="card-subtitle mb-2">
                            <strong><a style="text-decoration:none; font-style:oblique" href="{{ route('category.ads', $ad->category) }}">{{ $category->name }}</a></strong>
                        </div>
                        <a href="{{ route('ads.show', $ad) }}" class="btn btn-primary mostrarMas">{{__('Mostrar Más') }}</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <h2>{{__('Uyy.. parece que no hay nada de esta categoría') }}</h2>
                <a href="{{ route('ads.create') }}" class="btn btn-success">{{__('Vende tu primer objeto') }}</a> o <a href="{{ route('home') }}" class="btn btn-primary">{{__('Vuelve a la Home') }}</a>
            </div>
            @endforelse
            
        </div>
    </div>
    <div class="d-flex justify-content-center d-sm-block mx-5">
    {{$ads->links()}}
    </div>
    @includeIf('components.footer')
</x-layout>