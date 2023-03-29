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
      
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 bigTitle text-center">
                    <h1 class="txtMain display-5 fontTwo">{{__('ui.titleWelcome')}}
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
                    <h1 class=" text-center mt-5 txtMain fw-bold">{{__('ui.lastListings')}} <hr></h1>
                    @foreach ($articles as $article)
                        <div class="col-12 col-md-4">
                            <div class="main-pro bg-white shadow-card">
                                <div class=" p-3 bg-white text-black body-card">
                                    <div id="item-{{ $article->id }}" class="carousel slide" data-bs-ride="true">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#item-{{ $article->id }}"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#item-{{ $article->id }}"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#item-{{ $article->id }}"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="http://picsum.photos//300" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="http://picsum.photos//301" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="http://picsum.photos//302" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#item-{{ $article->id }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#item-{{ $article->id }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    {{-- <img src="http://picsum.photos//300" alt="immagine articolo"> --}}
                                    {{-- <img src="{{Storage::url($article->cover)}}" alt="immagine articolo"> --}}
                                    <h3 class="mt-4 text-bold">{{ $article->name }}</h3>
                                    <p class="mb-1 text-bold text-italic">{{ $article->price }} €</p>
                                    <p class="text-italic">{{ Str::limit($article->body, 60) }}</p>
                                    <p>{{__('ui.categories')}} <a class="text-decoration-none text-bold"
                                            href="{{ route('category.show', ['category' => $article->category]) }}">{{ $article->category->name }}</a>
                                    </p>
                                    <p>{{__('ui.published')}} {{ $article->created_at->format('d/m/Y') }}</p>
                                    <a class="btn btn-outline-dark ms-4 mb-5"
                                        href="{{ route('article.show', ['article' => $article]) }}">{{__('ui.viewMore')}}</a>
                                </div>


                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>





</x-layout>
