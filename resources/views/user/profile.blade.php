<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Inserisci Avatar</h2>
                <form class="my-5" action="{{ route('avatar', ['user' => Auth::user()]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="file" name="avatar" class="form-controll">
                    <button type="submit" class="btn btn-primary">Inserisci Immagine</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form class="mt-3" method="POST" action="{{ route('user.destroy') }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">cancella utente
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 my-5">
                {{-- @foreach (Auth::user()->articles as $article) --}}
                @foreach ($articles as $article)
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
                @endforeach
            </div>
        </div>
    </div>


</x-layout>
