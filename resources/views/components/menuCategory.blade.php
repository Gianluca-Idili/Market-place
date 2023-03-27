<div class="container ">
    <div class="row justify-content-center">
        <div class="col-12 text-center mt-3 categoryPc">
            @foreach ($categories as $category)
                <a class="menuCategoriesHover text-decoration-none mx-3 fs-5 "
                    href=" {{ route('category.show', compact('category')) }}">{{ $category->name }}</a>
            @endforeach

        </div>
    </div>
</div>
 {{-- StartSearch --}}
    <div class="container mt-4">
        <div class="row justify-content-center mt-3">
            <div class="col-12 col-md-8">
                <form action="{{ route('articles.search') }}" method="GET" class="w-100 d-flex button_Button">
                    <div class="w-100 d-flex"><input name="searched" placeholder="Cerca"
                            class="w-100 button_Button_One"></div>
                    <button class="btn" type="submit"> <i
                      class="searchImg bi bi-search my-auto mx-2 p-2 me-3"></i></button>
                </form>
            </div>
        </div>
    </div>
    {{-- FinishSearch --}}
    