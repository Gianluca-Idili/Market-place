<div>
    @if (session('articleCreated'))
        <div class="alert alert-success">
            {{ session('articleCreated') }}
        </div>
    @endif

    <form wire:submit.prevent="store" class="shadow p-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label fs-5  txtMain">Nome</label>
            <input type="string" wire:model.debounce.1200ms="name"
                class="form-control @error('name') is-invalid @enderror" id="name">
            @error('name')
                <span class="fst-italic text-danger small txtMain">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="txtMain fs-5" >Categoria</label>
            <select wire:model="category_id" id="category_id">
                <option class="txtMain " value="">Seleziona una categoria</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="error txtMain">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label fs-5 txtMain">Prezzo</label>
            <input type="double" wire:model="price" class="form-control @error('price') is-invalid @enderror"
                id="price">
            @error('price')
                <span class="fst-italic text-danger small txtMain">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label fs-5 txtMain">Descrizione</label>
            <textarea type="text" wire:model="body" cols="30" rows="7" class="form-control @error('body') is-invalid @enderror"
                id="body"></textarea>
            @error('body')
                <span class="fst-italic text-danger small txtMain">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class=" btn btn-addArt txtMain ">Inserisci</button>
    </form>
</div>
