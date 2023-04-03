<x-layout>
    {{-- <x-header>
        <h1 class="mt-5 txtMain ms-5" >Esplora la nostra vasta selezione di articoli</h1>
    </x-header> --}}
    <x-menuCategory />
    <x-search></x-search>
   
    @livewire('article-list')

    <div class="row justify-content-center">
        <div class="col-1 d-flex bgAccent rounded ">
            @for ($i = 1; $i <= $articles->lastPage(); $i++)
                <div  class=" text-center mx-auto text-white {{ ($i == $articles->currentPage()) ? ' active' : '' }}">
                    <a class="text-white" href="{{ $articles->url($i) }}">{{ $i }}</a>
                </div>
            @endfor
        </div>
    </div>
</x-layout>
