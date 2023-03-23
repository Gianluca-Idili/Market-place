<x-layout>
    <x-header>
        <h1 class="text-center mt-5">Accedi</h1>
    </x-header>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show border-start border-end">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo e-mail</label>
                        <input type="email" name="email" class="form-control" id="email"
                            aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    {{-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ricordami</label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Accedi</button>
                    <a class="btn btn-warning" href="{{ route('register') }}">Registrati</a>
                </form>
                
            </div>
        </div>
    </div>

</x-layout>
