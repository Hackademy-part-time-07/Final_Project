<x-layout>
    <div class="container content-wrap">
        <div class="d-flex justify-content-center my-5">
            <div class="col-12 col-md-6">

                    <div id="adImages" class="carousel slide imagenShow" data-bs-ride="true">
                
                        <div class="carousel-indicators">
                            @for ($i = 0; $i < $ad->images()->count(); $i++)
                                <button type="button" data-bs-target="#adImages" data-bs-slide-to="{{ $i }}" class="@if($i == 0) active @endif" aria-current="true" aria-label="Slide {{ $i + 1 }}"></button>
                            @endfor
                        </div>
                        <div class="carousel-inner">
                            @foreach ($ad->images as $image )
                                <div class="carousel-item @if($loop->first) active @endif">
                                <img src="{{ $image->getUrl(400,300) }}" alt="..." class="d-block w-100">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#adImages" data-bs-side="prev">
                            <span class="carousel-control-prev-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{__('Anterior') }}</span>

                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#adImages"data-bs-slide="next">
                            <span class="carousel-control-prev-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{__('Siguiente') }}</span>
                        </button>
                    </div>
                
                <div class="col-12 col-md-6 bodyShow">
                    <div class="precioShow">{{ is_float($ad->price) ? number_format($ad->price, 2) : number_format($ad->price) }}€</div>
                    <div class="tituloShow">{{ $ad->title }}</div>
                    <div class="descripcionShow">{{ $ad->body }}</div>
                    <div class="showTecnic px-3">
                        <div class="publicadoShow"><b>{{__('Publicado el') }}: </b>{{ $ad->created_at->format('d/m/Y') }}</div>
                        <div class="userShow"><b>{{__('Por') }}: </b>{{ $ad->user->name}}</div>
                    
                        <div class="categoriaShow"><a class="category-tag" style="text-decoration:none" href="{{ route('category.ads', $ad->category) }}" >{{ $ad->category->name }}</a></div>
                    </div>
                </div>
                <div class=" d-flex justify-content-center"><a href="#" class="btn btn-success m-3 botonComprar">Comprar</a></div>
            </div>
            </div>
        </div>
        
        @includeIf('components.footer')
    </x-layout>