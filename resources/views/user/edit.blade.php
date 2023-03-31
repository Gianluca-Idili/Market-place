<x-layout>
    <x-header>
        <h1 class="text-center mt-5 txtMain "> {{__('ui.editYourProfile')}} </h1>
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
                  <label for="name" class="form-label">{{__('ui.name')}} </label>
                  <input type="string" name="name" class="form-control" id="name" value="{{$user->name}}">
                </div>
                <div class="mb-3">
                  <label for="avatar" class="form-label">{{__('ui.chooseImage')}} </label>
                  <input type="file" name="avatar" class="form-control" id="avatar"value="{{$user->avatar}}">
                </div>
                <button type="submit" class="btn btn-outline-warning my-5">{{__('ui.confirmEdit')}} </button>
              </form>
              <div class="col-3 d-flex mt-5 justify-content-center mx-auto my-auto flex-column">
                <h2 class="display-5 mx-auto mb-3 fw-bold">{{__('ui.currentImg')}} </h2> 
                <div class="mb-3 mx-auto">
                  <h3 class="text-center pt-2 fs-3">{{__('ui.imgProfil')}} </h3>
                  <img src="{{Storage::url($user->avatar)}}" width="250px" height="150" alt="">
                </div>
            </div>
          </div>
        
    

</x-layout>
