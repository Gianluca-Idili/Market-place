{{-- menù categorie per pc --}}
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-12 text-center mt-3 fs-5 categoryPc">
            @foreach ($categories as $category)
                <a class="menuCategoriesHover text-decoration-none mx-3 fs-5 "
                    href=" {{ route('category.show', compact('category')) }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</div>

{{-- menù categorie per mobile --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <li class="nav-item dropdown fs-5 categoryForMobile">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                  {{__('ui.categories')}}
                </a>
                <ul class="dropdown-menu">
                @foreach ($categories as $category)
                <li><a class="dropdown-item" href="{{ route('category.show', compact('category'))}}">{{$category->name }}</a></li>
                @endforeach
                <li><a class="dropdown-item" href="{{ route('register') }}">{{__('ui.register')}} </a></li>
                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                </ul>
            </li>
        </div>
    </div>
</div>



    