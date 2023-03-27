<x-layout>
    <x-header>
        {{-- <h1 class="text-end me-5">Dettaglio di {{ $article->name }}</h1> --}}
    </x-header>
    <div class="container size_show">
        <div class="row justify-content-between  ">
            <div class="col-12 col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="http://picsum.photos//300" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://picsum.photos//301" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://picsum.photos//302" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-6 bg-white text-black text-center">
                <div class="display-3 txtMain">
                    <p class="mt-4 text-bold"><strong>{{ $article->name }}</strong></p>
                </div>
                <div class="fs-3 txtMain">
                    <p class="text-italic  justified">{{ $article->body }}</p>
                </div>
                <hr>
                <div class="fs-3 txtMain">
                    <p class="text-italic"><small> Caricato il :</small>  {{$article->created_at->format('d/m/Y')}} </p>
                <div class="fs-3 txtMain">
                <p class="text-italic"> <small>  Inserito da : </small> {{$article->user->name}}</p>
                </div>  
                <div class="fs-1 txtAccent">
                    <p class="mb-1 text-bold text-italic">{{ $article->price }} €</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
