<x-layout>
<x-menuCategory />
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 text-center my-5">
                    <h1>{{ $category->name }}</h1>
                </div>
            </div>
        </div>
        
    
    <div class="container-fluid py-5">
        <div class="row py-5 justify-content-center ">
            @forelse($category->articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-5 text-center ">
                    <a class="text-decoration-none" href="{{route('article.show', compact('article'))}}">
                        <div class="main-pro bg-white shadow-card">
                            <div class=" p-3 bg-white text-black body-card">
                                <img class="customCard" src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(1000,1000): 'https://picsum.photos/200'}}" alt="">    
                                <h3 class="mt-4 text-bold  ">{{ $article->name }}</h3>
                                <p class="mb-1 text-bold text-italic ">{{ $article->price }} €</p>
                                <p class="text-italic  ">{{ $article->body }}</p>
                                <p class=" ">{{__('ui.published')}} {{ $article->created_at->format('d/m/Y') }}</p>

                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 ms-5 ps-5">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <h3>{{__('ui.noArticle')}} </h3>
                                <h3>{{__('ui.publishArticle')}} <a class="btn btn-addArt" href="{{ route('article.create') }}">{{__('ui.add')}} </a></h3>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            @endforelse
        </div>
    </div>




</x-layout>
