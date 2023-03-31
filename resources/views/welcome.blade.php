<x-layout>
    <x-menuCategory />
    <x-search></x-search>
    {{-- <x-menuCategory/> --}}
    <x-header>
        @if (session('messageRevisor'))
        <div class="alert alert-success">
            {{ session('messageRevisor') }}
        </div>
        @endif
        
        <div class="container-fluid my-5 sloganWelcome">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 bigTitle text-center">
                    <h1 class="txtMain mt-0 mt-md-5 mb-5 mb-md-0 display-5 ">{{__('ui.titleWelcome')}}
                    </h1>
                </div>
            </div>
        </div>
    </x-header>
    
    <div class="container allArticles">
        <div class="row">
            <div class="col-12">
                {{-- <p>Ecco  tutti gli annunci</p> --}}
                <div class="row justify-content-center">
                    {{-- <h1 class=" text-center mt-5 txtMain fw-bold">{{__('ui.lastListings')}} <hr></h1> --}}
                    @foreach ($articles as $article)
                    <div class="col-12 col-md-3 text-center">
                        <div class="main-pro bg-white ">
                            <div class=" ms-1 ms-md-0 bg-white text-black body-card">
                                <div >
                                    <img class="customCard" src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(500,500): 'https://picsum.photos/200'}}" alt="">    
                                    
                                </div>
                                <h3 class="mt-4 text-bold text-center">{{ $article->name }}</h3>
                                <p class="mb-1 text-bold text-italic">{{ $article->price }} €</p>
                                <p class="text-italic">{{ Str::limit($article->body, 60) }}</p>
                                <p>{{__('ui.categories')}} <a class="text-decoration-none text-bold"
                                    href="{{ route('category.show', ['category' => $article->category]) }}">{{ $article->category->name }}</a>
                                </p>
                                <p>{{__('ui.published')}} {{ $article->created_at->format('d/m/Y') }}</p>
                                <a class="btn btn-addArt ms-4 mb-5"
                                href="{{ route('article.show', ['article' => $article]) }}">{{__('ui.viewMore')}}</a>
                            </div>                           
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
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
