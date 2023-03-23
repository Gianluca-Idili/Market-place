<nav class="navbar navbar-expand-lg bg-white mx-5 mt-5  mb-2 shadow">
    <div class="container-fluid">
        <a class="navbar-brand mb-2 " href="{{ route('homepage') }}"><img class="logoHover" width="180"
                src="\media\logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link txtMain fs-5  " href="{{ route('article.index') }}">Tutti gli articoli</a>
                </li>
                

                  
            </ul>
            <div class="nav-item mx-4 fs-5">
                <a class="nav-link  btn-addArt" aria-current="page" href="{{ route('article.create') }}">Inserisci articolo</a>
            </div>
            @guest
                <div class="nav-item dropdown me-3 fs-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                     Guest
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
                @else
                <div class="nav-item mx-4 fs-5">
                    <a class="nav-link  btn-addArt" aria-current="page" href="{{ route('article.create') }}">Inserisci articolo</a>
                </div>
                <div class="nav-item dropdown me-3 fs-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                         {{ Auth::user()->name }} 
                         <img style="width:50px; border-radius:50%" class="mx-3" src="{{Storage::url(Auth::user()->avatar)}}" alt="">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profilo</a></li>
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
<x-menuCategory />
