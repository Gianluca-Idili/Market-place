<x-layout>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-md-6 d-flex mb-5">
                    {{-- messaggi di errori --}}
                    @if (session()->has('userUpdated'))
                    <div class="alert alert-success alert-dismissible fade show border-start border-end" role="alert">
                        {{ session('userUpdated') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('avatarChange'))
                    <div class="alert alert-success alert-dismissible fade show border-start border-end" role="alert">
                        {{session('avatarChange')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
            </div>

                {{-- fine messaggi di errore --}}

                {{-- avatar e nome profilo --}}
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6 d-flex">
                        @if (Auth::user()->avatar == null)
                            <img style="width:100px; height:100px; border-radius:50%" class="mx-3"
                                src="{{ asset('media/avatarUser.png') }}" alt="">
                            @else
                                <img style="width:100px; height:100px; border-radius:50%" class="mx-0 mx-md-3"
                                    src="{{ Storage::url(Auth::user()->avatar) }}" alt="">
                            @endif
                        <h1 class="mx-3 mx-md-1 mt-3 mt-md-4">{{Auth::user()->name}}</h1>
                    </div>
                    <div class="col-6 col-md-6 d-flex justify-content-end ">               
                        <div class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-gear-fill display-6"></i>
                            </a>
                            <ul class="dropdown-menu fs-5">
                                <li>  
                                    <a class="btn btn-addArt ms-3 "
                                    href="{{ route('user.edit')}}">{{__('ui.edit')}}
                                </a>
                                </li>
                                <li>
                                    <form class="dropdown-item " method="POST" action="{{ route('user.destroy') }}">
                                        @csrf
                                        @method('delete')
                                       
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            {{__('ui.deleteProfile')}}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>   
            
                {{-- fine avatar e nome profilo --}}

        
 
<div class="container">
    <div class="row justify-content-center">
        {{-- @foreach (Auth::user()->articles as $article) --}}
        @foreach ($articles as $article)
        <div class="col-12  col-lg-3 my-5 text-center ">
            <a class=" text-decoration-none txtMain"
            href="{{ route('article.show', compact('article')) }}">
            <div class="h-100 ">
                <img class="customCard" src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(500,500): 'https://picsum.photos/200'}}" alt=""> 
                <div class="card-body ">
                    <h5 class="card-title fs-2 mt-3">{{ Str::limit ($article->name, 12) }}</h5>
                    <p class="card-title">{{ Str::limit($article->body, 30) }}</p>
                    <p>{{__('ui.publishedBy')}} <strong>{{ $article->user->name }} </strong>
                       
                    </p>
                    <div class="text-start ms-5 d-flex ps-2">
                         <a href="{{ route('article.show', compact('article')) }}"
                    class="btn btn-addArt mb-5 ms-2 ms-md-0">{{__('ui.viewMore')}}</a>
                    <form action="{{route('article.destroy',compact('article'))}}" method="POST" class="d-inline mt-2 ms-2">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger ms-5 ms-md-0 fs-5" type="submit">
                                Elimina
                            </button>
                            </form>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{__('ui.deleteProfile')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.goBack')}} </button>
                <div class="text-center col-6">
                    
                    <form method="POST" action="{{ route('user.destroy') }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">{{__('ui.confirm')}} </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end modal --}}










<div class="container">
    <h1>Articoli preferiti</h1>
    @if (isset($favourites) && count($favourites) > 0)
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($favourites as $favourite)
                    @if ($favourite->user_id == auth()->id())
                        <tr>
                            <td class="mt-1 fw-bold">{{ $favourite->article->name }}</td>
                            <td><a class="btn-addArt  text-decoration-none ms-5" href="{{ route('article.show',  $favourite->article->id) }}">More info</a></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <p>Non hai articoli preferiti</p>
    @endif
</div>
</x-layout>
