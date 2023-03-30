<x-layout>
    <x-header>
        <h1 class="text-center mt-5 txtMain ">Modifica il tuo profilo</h1>
    </x-header>
        <div class="container-fluid text-warning home3 fw-bold p-0 home">
          <div class="row title_bg justify-content-center">
            <div class="col-12 col-md-4">
              @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <form class="p-5 shadow" method="POST" action="{{route('user.update')}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3 ">
                  <label for="name" class="form-label">Nome</label>
                  <input type="string" name="name" class="form-control" id="name" value="{{$user->name}}">
                </div>
                <div class="mb-3">
                  <label for="avatar" class="form-label">Scegli un immagine</label>
                  <input type="file" name="avatar" class="form-control" id="avatar">
                </div>
                <button type="submit" class="btn btn-outline-warning my-5">Conferma le modifiche</button>
              </form>
            </div>
          </div>
        
    

</x-layout>
