<div>
    @if (session('articleCreated'))
        <div class="alert alert-success">
            {{ session('articleCreated') }}
        </div>
    @endif
    <form wire:submit.prevent="store" class="shadow p-5 borderCustom" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label fs-5  txtMain">{{__('ui.name')}}</label>
            <input type="string" wire:model.debounce.1200ms="name"
                class="form-control @error('name') is-invalid @enderror" id="name">
            @error('name')
                <span class="fst-italic text-danger small txtMain">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="txtMain fs-5">{{__('ui.category')}}</label>
            <select wire:model="category_id" id="category_id">
                <option class="txtMain " value="">{{__('ui.selectCategory')}}</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="error txtMain">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label fs-5 txtMain">{{__('ui.price')}}</label>
            <input type="number" wire:model="price" class="form-control @error('price') is-invalid @enderror"
                id="price">
            @error('price')
                <span class="fst-italic text-danger small txtMain">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label fs-5 txtMain">{{__('ui.description')}}</label>
            <textarea type="text" wire:model="body" cols="30" rows="7"
                class="form-control @error('body') is-invalid @enderror" id="body"></textarea>
            @error('body')
                <span class="fst-italic text-danger small txtMain">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <input wire:model="temporary_images" type="file" multiple
                class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img" />
            @error('temporary_images.*')
                <p class=" text-danger small ">{{ $message }}</p>
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo preview:</p>
                    <div class="row border border-4 border-info rounded shadow py-4">
                        @foreach ($images as $key => $image)
                            <div class="col my-3">
                                <div class="img-preview mx-auto shadow rounded img-fluid"
                                    style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                    wire:click="removeImage({{ $key }})">{{ __('ui.delete') }}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <button type="submit" class=" btn btn-addArt txtMain ">{{__('ui.insert')}}</button>
    </form>
</div>
