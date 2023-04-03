<div class="container footerMobile fixed-bottom border border-top">
    <div class="row justify-content-evenly bg-white py-1">
        <a href="{{ route('homepage') }}" class="col-2"><i class=" display-3 text-decoration-none txtMain"> <img
                    class="logoTrasp" src="{{url('media\logoblu.png')}}" alt=""></i></a>
        {{-- <a href="#" class="col-2"><i class=" display-3 text-decoration-none txtMain bi bi-cart4"></i></a> --}}
        <a href="{{route('contact_us')}}" class="col-2"><i
            class=" display-3 text-decoration-none txtMain bi bi-envelope"></i></a>
        <a href="{{ route('article.create') }}" class="col-2"><i
                class=" display-3 text-decoration-none txtAccent bi bi-plus-circle"></i></a>
        <a href="{{route('article.profilePreferiti')}}" class="col-2"><i class=" display-3 text-decoration-none txtMain bi bi-heart"></i></a>
        <a href="{{ route('user.profile') }}" class="col-2"><i
                class=" display-3 text-decoration-none txtMain bi bi-person-circle"></i></a>
    </div>
</div>
