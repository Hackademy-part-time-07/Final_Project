<x-layout>
    <x-slot name="title">Metapop - {{__('Vende algo interesante') }}</x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-4 formularios">
                        {{__('Nuevo anuncio') }}
                    </div>
                    <div class="card-body formularios">
                        <livewire:create-ad />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>