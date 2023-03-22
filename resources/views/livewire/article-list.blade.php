<div class="container-fluid py-5">
    <div class="row py-5">
        @if(count($articles))
            @foreach($articles as $article)
            <div class="col-12 col-md-6 col-lg-4 mb-5">
                <a class="text-decoration-none" href="{{route('article.show', ['article'=>$article])}}">
                    <div class="main-pro bg-white shadow-card">
                        <div class="ms-4 p-3 bg-white text-black body-card"> 
                            <img src="http://picsum.photos//300" alt="immagine articolo">
                            <h3 class="mt-4 text-bold">{{$article->name}}</h3>
                            <p class="mb-1 text-bold text-italic">{{$article->price}} €</p> 
                            <p class="text-italic">{{ $article->body }}</p> 
                        </div> 
                        <a class="btn btn-outline-dark ms-4 mb-5" href="{{route('article.show', ['article'=>$article])}}">vedi di più..</a>
                    </div>
                </a> 
            </div>
            @endforeach
        @else
            <div class="col-12 ms-5 ps-5">
            Sorry to inform you that there are no houses available for sale at the moment.
            </div>
        @endif
    </div>
</div>
