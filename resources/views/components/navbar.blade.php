<nav  class="navbar navbar-expand-lg bg-white mx-1 mx-md-5 mt-1 mt-md-1  mb-2 shadow hidden">
    <div class="container-fluid">
        <a class="navbar-brand mb-2 " href="{{ route('homepage') }}"><img class="logoHover" width="180"
                src="\media\logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                
                <li class=" lingueMobile">
                    <div class="nav-item">
                    <x-_locale lang='it'  />                   
                </div>
                <div class="nav-item">
                    <x-_locale lang='en' />
                    
                </div>
                <div class="nav-item">
                    <x-_locale lang='es'  />
                </div>
            </li>
                {{-- bandierine --}}
               <li class="nav-item">
                    <a class="nav-link txtMain fs-5  " href="{{ route('article.index') }}">{{__('ui.allArticles')}}</a>
                </li>

                {{-- se l'utente è revisore ed è loggato --}}
                @if (Auth::user() && Auth::user()->is_revisor)
                    <li class="nav-item">
                        <a class="nav-link txtMain fs-5 position-relative" href="{{ route('revisor.index') }}">{{__('ui.areaReviewer')}}
                            <span class=" spanRevisor translate-middle badge rounded-pill">
                                {{ App\Models\Article::toBeRevisionedCount() }}
                                <span class="visually-hidden">
                                    {{__('ui.mexagesNoVie')}}
                                </span>
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
            @guest
                <div class="nav-item dropdown me-5 fs-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Guest
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('register') }}">{{__('ui.register')}}</a></li>
                        <li><a class="dropdown-item" href="{{ route('login') }}">{{__('ui.login')}}</a></li>
                    </ul>
                </div>
            @else
                <div class="nav-item  fs-5 addArtPc">
                    <a class="nav-link mb-2  btn-addArt" aria-current="page" href="{{ route('article.create') }}">{{__('ui.insertArticle')}}</a>
                </div>
                <div class="nav-item dropdown me-3 fs-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}

                      {{-- @if(Storage::exists(Auth::user()->avatar) )
                        <img style="width:50px; height:50px; border-radius:50%" class="mx-3"
                        src="{{ Storage::url(Auth::user()->avatar) }}" alt="">
                      @else
                        <img style="width:50px; height:50px; border-radius:50%" class="mx-3"
                        src="{{asset('/public/media/2.jgp')}}" alt="">
                      @endif --}}
                      @if (Auth::user()->avatar == null)
                      <img style="width:50px; height:50px; border-radius:50%" class="mx-3"
                           src="{{ asset('media/avatarUser.png') }}" alt="">
                  @else
                      <img style="width:50px; height:50px; border-radius:50%" class="mx-3"
                           src="{{ Storage::url(Auth::user()->avatar) }}" alt="">
                  @endif










                    </a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">{{__('ui.profile')}}</a></li>
                        <li><a class="dropdown-item" href=""
                                onclick="event.preventDefault();document.querySelector('#form-logout').submit()">Logout</a>
                        </li>
                        <form id="form-logout" method="POST" class="d-none" action="{{ route('logout') }}">@csrf
                        </form>

                    </ul>
                </div>
            @endguest
        </div>
    </div>
</nav>

