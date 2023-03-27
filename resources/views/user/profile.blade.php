<x-layout>
    <div class="container">
        <div class="row">
            
            <div class="col-12 col-md-6">
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
                <h2>Inserisci Avatar</h2>
                <form class="my-5" action="{{ route('avatar', ['user' => Auth::user()]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="file" name="avatar" class="form-controll">
                    <button type="submit" class="btn btn-primary">Inserisci Immagine</button>
                </form>
            </div>
        <div class="col-12 col-md-6 d-flex justify-content-center align-item-center my-auto">
            <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-gear-fill display-6"></i>
                </a>
                <ul class="dropdown-menu fs-5">
                    <li>
                        <form class="mt-3 dropdown-item " method="POST" action="{{ route('user.destroy') }}">
                            @csrf
                            @method('delete')
                            {{-- <button type="submit" class="btn btn-danger">cancella utente
                            </button> --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Cancella profilo
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        {{-- @foreach (Auth::user()->articles as $article) --}}
        @foreach ($articles as $article)
        <div class="col-12 col-lg-3 my-5">
            <div class="card">
                <img src="https://picsum.photos/300" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->name }}</h5>
                    <p class="card-text">{{ $article->body }}</p>
                    <p>Pubblicato da:
                        <p class=" fw-bold fst-italic">{{ $article->user->name }}</p>
                    </p>
                    <a href="{{ route('article.show', compact('article')) }}"
                    class="btn btn-primary me-3">Dettaglio</a>
                </div>
            </div>
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
                Sei sicuro di voler cancellare il profilo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Torna indietro</button>
                <div class="text-center col-6">
                    
                    <form method="POST" action="{{ route('user.destroy') }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Conferma</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end modal --}}
</x-layout>
