<div class="container-fluid my-5">
    <div class="row picShow position-relative">
        <h2 class="sloganIndex display-4 ">{{__('ui.titleIndex1')}} <br>  {{__('ui.titleIndex2')}}.</h2>
        <div class="col-12">

        </div>
    </div>
</div>



<div class="container-fluid py-5">
    <div class="row py-5">
        @if (count($articles))
            @forelse($articles as $article)
                <a class="col-12 col-md-6 col-lg-3 text-center text-decoration-none txtMain my-5"
                    href="{{ route('article.show', compact('article')) }}">
                    <img class="customCard"  src="{{!$article->images()->get()->isEmpty() ?Storage::url($article->images()->first()->path): 'https://picsum.photos/200'}}" alt="">    
                                            
                    <p class="text-start my-2 text-bold text-italic textCard fs-2 fw-bold">{{ $article->price }} €</p>
                    <h3 class="text-start  text-bold textCard">{{ $article->name }}</h3>
                    {{-- <p class="text-start text-italic textCard">{{ $article->body }}</p>  --}}
                </a>
            @empty
                <div class="col-12 ms-5 ps-5">
                    Sorry to inform you that there are no houses available for sale at the moment.
                </div>
            @endforelse
            {{-- {{$articles->links()}} --}}
        @endif
    </div>

</div>
