<x-layout>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6">
                <h1 class="text-center mt-5">
                    {{ $article_to_check ? __('ui.NewArticlesRew') : __('ui.noNewArticlesRew') }}
                    <hr>
                </h1>
            </div>
        </div>
    </div>
    @if ($article_to_check)
        <div class="container-fluid py-5">
            <div class="row justify-content-center py-5">
                <div class="col-12 col-md-6" style="height: 500px; width:500px;">
                    <div id="item-{{ $article_to_check->id }}" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#item-{{ $article_to_check->id }}"
                                data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#item-{{ $article_to_check->id }}"
                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#item-{{ $article_to_check->id }}"
                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        @if ($article_to_check->images)
                            <div class="carousel-inner">
                                @foreach ($article_to_check->images as $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div>
                                <div class="carousel-item">
                                    <img src="http://picsum.photos//301" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="http://picsum.photos//302" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        @endif
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#item-{{ $article_to_check->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#item-{{ $article_to_check->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div> {{-- seconda colonna --}}
                <div class="col-12 col-md-6">
                    <h3 class="text-bold mb-4">{{ $article_to_check->name }}</h3>
                    <p class=" text-bold text-italic mb-4">{{ $article_to_check->price }} €</p>
                    <p class="text-italic mb-4">{{ $article_to_check->body }}</p>
                    <div class="d-flex justify-content-center">
                        <form class="mx-5 my-5"
                            action="{{ route('revisor.accept_article', ['article' => $article_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn fs-5 btn-success">{{__('ui.accept')}}</button>
                        </form>
                        <form class="mx-5 my-5"
                            action="{{ route('revisor.reject_article', ['article' => $article_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn fs-5 btn-danger">{{__('ui.reject')}}</button>
                        </form>

                    </div>


                    {{-- @if ($article_to_check->images) --}}
                        @foreach ($article_to_check->images as $image)
                            <div class="col-md-6">
                                <div class="">
                                    <h5 class="">{{__('ui.imageReviewer')}}</h5>
                                    {{-- @dd($image->adult) --}}
                                    <p>Adulti: <span class="{{$image->adult}}"></span></p>
                                    <p>Satira: <span class="{{$image->spoof}}"></span></p>
                                    <p>Medicina: <span class="{{$image->medical}}"></span></p>
                                    <p>Violenza: <span class="{{$image->violence}}"></span></p>
                                    <p>Contenuto ammiccante: <span class="{{$image->racy}}"></span></p>
                                </div>
                                <div class="col-12 border-end">
                                    <h5 class=" mt-3">Tags</h5>
                                    <div class="p-2">
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                <p class="d-inline">{{$label}}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    {{-- @endif --}}
                </div>

            </div>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-end">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    {{__('ui.backLastOperation')}}
                </button>
            </div>

        </div>

    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{__('ui.areYouSureConf')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.goBack')}}</button>
                    <div class="text-center col-6">
                        <form method="POST" action="{{ route('revisor.update') }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">{{__('ui.confirm')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layout>
