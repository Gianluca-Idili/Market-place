<x-layout>
    <x-menuCategory />
    <x-header>
        {{-- <h1 class="text-end me-5">Dettaglio di {{ $article->name }}</h1> --}}
    </x-header>
    <div class="container size_show">
        <div class="row justify-content-between  ">
            <div class="col-12 col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @foreach($article->images as $index => $image)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}"
                                @if($loop->first)class="active" aria-current="true"@endif aria-label="Slide"></button>
                        @endforeach  
                    </div>
                    @if($article->images)
                    <div class="carousel-inner">
                        @foreach ($article->images as $image)
                            <div class="carousel-item @if($loop->first)active @endif">
                            <img src="{{Storage::url($image->path)}}" class="d-block imageShow" alt="...">
                        </div>
                        @endforeach
                    </div>    
                        @else
                    <div>    
                        <div class="carousel-item">
                            <img src="http://picsum.photos//301" class="d-block imageShow w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://picsum.photos//302" class="d-block imageShow w-100" alt="...">
                        </div>
                    </div>
                    @endif
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
                <div class="bg-white text-black text-end">
                    <div class="display-6 txtMain">
                        <p class="mb-5 text-bold"><strong>{{ $article->name }}</strong></p>
                    </div>
                    <div class="fs-3 txtMain">
                        <p class="text-italic min-wh-100 justified">
                            <span class="article-body">{{ Str::limit($article->body, 200) }}</span>
                            @if (strlen($article->body) > 200)
                                <a href="#" class="read-more">Leggi di più</a>
                            @endif
                        </p>
                    </div>
                    <script>
                        let clicks = 0;
                        document.querySelector('.read-more').addEventListener('click', function(e) {
                            e.preventDefault();
                            clicks++;
                            if (clicks % 2 == 1) {
                                document.querySelector('.article-body').innerHTML = "{{ $article->body }}";
                                this.innerHTML = "Leggi meno";
                            } else {
                                document.querySelector('.article-body').innerHTML = "{{ Str::limit($article->body, 200) }}";
                                this.innerHTML = "Leggi di più";
                            }
                        });
                    </script>
                <hr>
                <div class="bg-white text-black text-end">
                        <div class="fs-3 txtMain">
                            <p class="text-italic"><small>{{__('ui.uploadedOn')}} </small> {{ $article->created_at->format('d/m/Y') }}
                            </p>
                        </div>
                        <div class="fs-3 txtMain">
                            <p>{{__('ui.categories')}} <a class="text-decoration-none text-bold"
                                href="{{ route('category.show', ['category' => $article->category]) }}">{{ $article->category->name }}</a>
                            </p>
                        </div>
                        <div class="fs-3 txtMain">
                            <p class="text-italic"> <small> {{__('ui.insertBy')}} </small> {{ $article->user->name }}</p>
                        </div>
                        <div class="fs-1 txtAccent">
                            <p class="mb-1 text-bold text-italic">{{ $article->price }} €</p>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="text-end mt-3">
                
                {{-- <a class="btn btn-succes" href="">compra</a> --}}
                <a class="btn btn-addArt" href="{{ route('article.index') }}">{{__('ui.goBack')}}</a>


            </div>
        </div>
    </div>
</x-layout>
