<article class="row">
    {{-- Cover --}}
    <div class="col-2">
        <img class="book-cover" src="{{ asset($book->cover_path) }}" alt="{{ $book->title }}">
    </div>
    {{-- Details --}}
    <div class="col-7 ps-5 position-relative">
        <h1 class="h4 fw-normal mb-1">{{ $book->title }}</h1>
        <h2 class="h5 fw-normal">{{ $book->authors->first()->fullname }}</h2>
        <h3 class="h6">{{ $book->category->title }}</h3>

        {{-- More details --}}
        <div class="my-4">
            <div>Editeur : {{ $book->editor->name }}</div>
            <div>Parution : {{ $book->publish_at->format('M Y') }}</div>
            <div>Pages : {{ $book->pages_num }}</div>
            <div>Ajouté par : {{ $book->uploaded_by->fullname }}</div>
        </div>

        {{-- Pricing --}}
        <div class="d-flex flex-column align-items-end position-absolute end-0 bottom-0 me-2">
            <div class="my-2">
                <x-pricetag :amount="$book->price / 100" class="fw-bold fs-2"/>
            </div>
            <div>
                <button class="btn btn-primary">Ajouter au panier d'achat</button>
            </div>
        </div>
    </div>
</article>