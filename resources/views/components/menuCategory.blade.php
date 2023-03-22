<div class="container ">
    <div class="row justify-content-center">
        <div class="col-12 text-center mt-2 ">
            @foreach ($categories as $category)
        <a class="menuCategoriesHover text-decoration-none mx-3 fs-6 "
                href=" {{ route('category.show', compact('category')) }}">{{ $category->name }}</a>
        
    @endforeach
            
        </div>
    </div>
</div>

    
