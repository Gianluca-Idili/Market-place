<x-layout>
    <x-header>
        <h1>dettaglio di {{$article->name}}</h1>
    </x-header>



    <div class="col-12 col-md-6 col-lg-4 mb-5">
        <p class="text-decoration-none">
            <div class="main-pro bg-white shadow-card">
                <div class="ms-4 p-3 bg-white text-black body-card"> 
                    <img src="http://picsum.photos//300" alt="immagine articolo">
                    <h3 class="mt-4 text-bold">{{$article->name}}</h3>
                    <p class="mb-1 text-bold text-italic">{{$article->price}} €</p> 
                    <p class="text-italic">{{ $article->body }}</p> 
                </div> 
            </div>
        </p> 
    </div>
</x-layout>