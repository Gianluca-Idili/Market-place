<div>
    @if(session('articleCreated'))
    <div class="alert alert-success">
        {{session('articleCreated')}}
    </div>
    @endif

    <form wire:submit.prevent="store" class="shadow p-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">nome</label>
            <input type="string" wire:model.debounce.1200ms="name" class="form-control @error("name") is-invalid @enderror" id="name">
            @error('name')
                <span class="fst-italic text-danger small">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Categoria</label>
            <select wire:model="category_id" id="category_id">
                <option value="">Seleziona una categoria</option>
                
                @foreach($categories as $category)
            
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                    
                @endforeach
            </select>
            @error('category_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        @if($cover)
        <div class="mb-3">
                Anteprima immagini:
                <img src="{{$cover->temporaryUrl()}}" alt="">
        </div>
        @endif
        <div class="mb-3">
            <label for="cover" class="form-label">Immagine</label>
            <input type="file" wire:model="cover" class="form-control @error("cover") is-invalid @enderror" id="cover">
            @error('cover')
                <span class="fst-italic text-danger small">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">prezzo</label>
            <input type="double" wire:model="price" class="form-control @error("price") is-invalid @enderror" id="price">
            @error('price')
                <span class="fst-italic text-danger small">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">breve descrizione</label>
            <input type="text" wire:model="body" class="form-control @error("body") is-invalid @enderror" id="body">
            @error('body')
                <span class="fst-italic text-danger small">{{$message}}</span>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">crea</button>
    </form>
</div>
               