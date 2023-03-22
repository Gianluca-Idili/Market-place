<x-layout>
    <x-header>
                    {{-- TITOLO HOME --}}
                    <h1>Hello world!!</h1>
    </x-header>
<div class="container">
    <div class="row">
        <div class="col-12">
            <p>Ecco  tutti gli annunci</p>
            <div class="row">
                @foreach($articles as $article)
                <div class="col-12 col-md-4">
                    <div class="main-pro bg-white shadow-card">
                        <div class="ms-4 p-3 bg-white text-black body-card"> 
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators">
                                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
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
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            {{-- <img src="http://picsum.photos//300" alt="immagine articolo"> --}}
                            {{-- <img src="{{Storage::url($article->cover)}}" alt="immagine articolo"> --}}
                            <h3 class="mt-4 text-bold">{{$article->name}}</h3>
                            <p class="mb-1 text-bold text-italic">{{$article->price}} €</p> 
                            <p class="text-italic">{{ $article->body }}</p> 
                            <p>Categorie: <a class="text-decoration-none text-bold" href="{{route('category.show', ['category'=>$article->category])}}">{{$article->category->name}}</a></p>
                            <p>Pubblicato il {{$article->created_at->format('d/m/Y')}}</p>
                            <a class="btn btn-outline-dark ms-4 mb-5" href="{{route('article.show', ['article'=>$article])}}">vedi di più..</a>
                        </div> 
                        
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>





</x-layout>