@php
    $bookProvided = session()->has('searchedBook');
    $book = session()->get('searchedBook') ?? [];
    $coverProvided = $bookProvided && array_key_exists('cover_path', $book->getAttributes());
@endphp
<form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- General information --}}
    <div class="border-bottom">
        <h2 class="h4 mb-3 fw-500">Information générales</h2>
        <div class="row">
            @if ($coverProvided)
                <div class="col-4">
                    <div class="me-2 pt-4">
                        <img class="w-100" src="{{ asset($book->cover_path) }}" alt="{{ $book->title }}">
                    </div>
                </div>                
            @endif
            <div class="col-{{$coverProvided ? '8' : '12'}}">
                <div class="mb-3">
                    <label class="form-label">Titre*</label>
                    <x-inputs.field type="text" name="title" :value="old('title', $book->title ?? '')" :readonly="isset($book->title)" />
                </div>
                <div class="mb-3 row">
                    <div class="col-6">
                        <label class="form-label">Nombre de page*</label>
                        <x-inputs.field type="number" name="pages_num" min="0" :value="old('pages_num', $book->pages_num ?? '')" :readonly="isset($book->pages_num)" />
                    </div>
                    <div class="col-6">
                        <label class="form-label">Date de parution*</label>
                        <x-inputs.field type="date" name="published_at" :value="old('published_at', isset($book->published_at) ? $book->published_at->format('Y-m-d') : '')" :readonly="isset($book->published_at)"/>
                    </div>
                </div>
        
                <div class="mb-4">
                    <label class="form-label">Résumé*</label>
                    <x-inputs.textarea name="description" rows="6" :value="old('description', $book->description ?? '')" :readonly="isset($book->description)" />
                </div>
            </div>
        </div>
    </div>

    {{-- Information about the authors --}}    
    <div class="my-4 border-bottom">
        <h2 class="h5 fw-500">Auteur(s)</h2>
        
        @if($bookProvided)
            <ul class="list-group mb-4">
                @foreach ($book->authors as $author)
                    <li class="list-group-item py-2 px-3">{{ $author }}</li>                    
                @endforeach
            </ul>
        @else
            <div class="row mb-2">
                <div class="col">
                    <h3 class="h6 fw-normal">Choisissez un ou plusieurs auteur*</h3>
                </div>
                <div class="col-auto">
                    <a href="" class="btn btn-primary btn-sm d-flex align-items-center">
                        <span class="material-icons md-18 me-1">add</span>
                        <span>Ajouter</span>
                    </a>
                </div>
            </div>
            <div class="mb-4">
                <x-inputs.select name="authors[]" class="form-select form-select" multiple>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->fullname }}</option>
                    @endforeach
                    <x-slot name="description">
                        Appuez sur CTRL pour pouvoir séléctionner plusieurs éléments dans la liste.
                    </x-slot>
                </x-inputs.select>
            </div>
        @endif
    </div>

    {{-- Information about the category --}}
    <div class="my-4 border-bottom">
        <h2 class="h5 fw-500">Catégorie</h2>
        <div class="row mb-2">
            <div class="col">
                <h3 class="h6 fw-normal">Choisissez la catégorie du livre*</h3>
            </div>
        </div>
        <div class="mb-4">
            <x-inputs.select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </x-inputs.select>
        </div>
    </div>
    
    {{-- Product information --}}
    <div class="mb-4">
        <h2 class="h5 fw-500">Produit</h2>
        <div class="row mb-3">
            <div class="col-6">
                <label class="form-label">Prix*</label>
                <x-inputs.field type="number" name="price" value="{{ old('price', $price ?? 0) }}" min="0" />
            </div>
            <div class="col-6">
                <label class="form-label">Quantité*</label>
                <x-inputs.field type="number" name="quantity" value="{{ old('quantity', $quantity ?? 1) }}" min="1" />
            </div>
        </div>                        
        <div class="row mb-3">
            <div class="col-6">
                <label class="form-label">ISBN*</label>
                <x-inputs.field type="number" name="isbn" value="{{ old('isbn', $isbn ?? $book->isbn ?? '') }}" :readonly="$bookProvided && isset($book->isbn)" />
                {{-- <x-input type="number" name="isbn" placeholder="Ex: 9782828920036" :readonly="$readonly" value="{{ $book->isbn ?? '' }}" /> --}}
            </div>

        </div>
    </div>

    {{-- Cover --}}    
    @unless ($coverProvided)
        <div class="mb-4">
            <h2 class="h5 fw-500">Couverture</h2>
            <x-inputs.field type="file" name="cover" />
        </div>
    @endunless

    
    <button type="submit" class="btn btn-primary d-flex align-items-center ms-auto">
        <span class="material-icons me-1">post_add</span>
        <span class="fw-bold">AJOUTER</span>
    </button>
</form>