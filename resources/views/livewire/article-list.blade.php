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
        <div class="col-12  col-lg-3 my-5 text-center">
            <a class=" text-decoration-none txtMain"
            href="{{ route('article.show', compact('article')) }}">
            <div class="h-100 ">
                <img class="customCard" src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(500,500): 'https://picsum.photos/200'}}" alt=""> 
                <div class="card-body ">
                    <h5 class="card-title fs-2 mt-3">{{ Str::limit ($article->name, 12) }}</h5>
                    <p class="card-title">{{ Str::limit($article->body, 30) }}</p>
                    {{-- <p>{{__('ui.publishedBy')}} <strong>{{ $article->user->name }} </strong> --}}
                        
                    </p>
                    <div class="text-start ms-5 d-flex ps-2">
                        <a href="{{ route('article.show', compact('article')) }}"
                        class="btn btn-addArt mb-5 ms-2 ms-md-0">{{__('ui.viewMore')}}</a>
                        <p class="card-text txtAccent fs-2 text-end  mt-3 mt-md-2 me-0 me-md-3 ms-5 ms-md-3 mt-2">{{($article->price) }} €</p>
                           @if (Auth::check())
                                @php
                                    $favourite = Auth::user()->favourites()->where('article_id', $article->id)->first();
                                @endphp
                                @if ($favourite)
                                    <form class="mt-3 mt-md-2 ms-3 ms-md-0 fs-2" method="POST" action="{{ route('articles.removeFavorite', ['article_id' => $article->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="favorite-button active">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </form>
                                @else
                                    <form class="mt-3 mt-md-2 ms-3 ms-md-0" id="add-favorite-form" method="POST" action="{{ route('articles.addFavorite') }}">
                                        @csrf
                                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                                        <button type="submit" class="btn btn-link" style="padding: 0;">
                                            <i class=" text-black far fa-heart fs-2"></i>
                                        </button>
                                    </form>
                                @endif
                             @endif
                    </div>
                    
 
                
            </div>
        </div>
    </a>
</div>
@empty
<div class="col-12 ms-5 ps-5">
    {{__('ui.noArticles')}}
</div>
@endforelse
{{-- {{$articles->links()}} --}}
@endif
</div>

</div>
