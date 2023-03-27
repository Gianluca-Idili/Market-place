<x-layout>
    <x-header>
        <h1>Esplora la categoria : {{ $category->name }}</h1>
    </x-header>
    <div class="container-fluid py-5">
        <div class="row py-5">
            @forelse($category->articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-5">
                    <a class="text-decoration-none" href="#">
                        <div class="main-pro bg-white shadow-card">
                            <div class="ms-4 p-3 bg-white text-black body-card">
                                <img src="http://picsum.photos//300" alt="immagine articolo">
                                <h3 class="mt-4 text-bold">{{ $article->name }}</h3>
                                <p class="mb-1 text-bold text-italic">{{ $article->price }} €</p>
                                <p class="text-italic">{{ $article->body }}</p>
                            </div>
                            {{-- <button class="btn btn-outline-dark ms-4 mb-5" type="submit">Read More...</button> --}}
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 ms-5 ps-5">
                    Non ci sono annunci.
                    <p>
                        Pubblicane uno: <a class="btn btn-success" href="{{ route('article.create') }}">Aggingi</a>
                    </p>
                </div>
            @endforelse
        </div>
    </div>




</x-layout>
