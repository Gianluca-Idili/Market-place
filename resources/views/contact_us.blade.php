<x-layout>
  <x-header>
    <h1 class="text-center mt-5">{{__('ui.contactUs')}}</h1>
  </x-header>
 
  @if (session('emailError'))
  <div class="alert alert-success">
      {{ session('emailError') }}
  </div>
  @endif
    <div class="container-fluid  my-5">
        <div class="row justify-content-center">
            <div class="col 12 col-md-4">
                <form class=" borderCustom shadow p-5" method="POST" action="{{route('contact_us_submit')}}">
                    @csrf
                    <div class="my-5">
                      <label for="email" class="form-label">{{__('ui.eMail')}}</label>
                      <input type="email" name="email" class="form-control" id="email" >
                      <div id="email" </div>
                    </div>
                    <div class="my-5">
                      <label for="name" class="form-label">{{__('ui.insertName')}}</label>
                      <input type="name" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-5">
                        <label for="message" class="form-label">{{__('ui.insertMessage')}}</label>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="5"></textarea>
                      </div>
                    
                    <button type="submit" class=" btn btn-addArt mb-5">{{__('ui.submit')}} </button>
                  </form>
            </div>

        </div>
    </div>
</x-layout>