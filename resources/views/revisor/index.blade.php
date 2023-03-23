<x-layout>
    
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <h1>
            {{$article_to_check ? 'Ecco l\'annuncio sa revisionare' : 'Non ci sono annunci da revisionare'}} 
            </h1>
        </div>
    </div>
</div>
@if($article_to_check)
<div class="container-fluid py-5">
    <div class="row py-5">
            <div class="col-12 col-md-6 col-lg-4 m-5 customCard">
                    <div class="main-pro bg-white shadow-card h-100">
                            <div id="item-{{$article_to_check->id}}" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators">
                                  <button type="button" data-bs-target="#item-{{$article_to_check->id}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                  <button type="button" data-bs-target="#item-{{$article_to_check->id}}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                  <button type="button" data-bs-target="#item-{{$article_to_check->id}}" data-bs-slide-to="2" aria-label="Slide 3"></button>
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
                                <button class="carousel-control-prev" type="button" data-bs-target="#item-{{$article_to_check->id}}" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#item-{{$article_to_check->id}}" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <h3 class="mt-4 text-bold">{{$article_to_check->name}}</h3>
                            <p class="mb-1 text-bold text-italic">{{$article_to_check->price}} €</p> 
                            <p class="text-italic">{{ $article_to_check->body }}</p> 
                            <form action="{{route('revisor.accept_article', ['article'=>$article_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Accetta</button>
                            </form>
                            <form action="{{route('revisor.reject_article', ['article'=>$article_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Rifiuta</button>
                            </form>
                    </div>
            </div>
    </div>
</div>
@endif


</x-layout>