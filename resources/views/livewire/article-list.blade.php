<div class="container-fluid py-5">
    <div class="row py-5">
        @if(count($articles))
            @foreach($articles as $article)
            <div class="col-12 col-md-6 col-lg-4 mb-5">
                {{-- <a class="text-decoration-none" href="{{route('article.show', ['article'=>$article])}}"> --}}
                    <div class="main-pro bg-white shadow-card">
                        <div class="ms-4 p-3 bg-white text-black body-card"> 
                            <div id="item-{{$article->id}}" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators">
                                  <button type="button" data-bs-target="#item-{{$article->id}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                  <button type="button" data-bs-target="#item-{{$article->id}}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                  <button type="button" data-bs-target="#item-{{$article->id}}" data-bs-slide-to="2" aria-label="Slide 3"></button>
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
                                <button class="carousel-control-prev" type="button" data-bs-target="#item-{{$article->id}}" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#item-{{$article->id}}" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            {{-- <img src="http://picsum.photos//300" alt="immagine articolo"> --}}
                            <h3 class="mt-4 text-bold">{{$article->name}}</h3>
                            <p class="mb-1 text-bold text-italic">{{$article->price}} €</p> 
                            <p class="text-italic">{{ $article->body }}</p> 
                        </div> 
                        <a class="btn btn-outline-dark ms-4 mb-5" href="{{route('article.show', ['article'=>$article])}}">vedi di più..</a>
                    </div>
                {{-- </a>  --}}
            </div>
            @endforeach
        @else
            <div class="col-12 ms-5 ps-5">
            Sorry to inform you that there are no houses available for sale at the moment.
            </div>
        @endif
    </div>
</div>
