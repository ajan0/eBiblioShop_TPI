<article class="row">
    {{-- Cover --}}
    <div class="col-2">
        <img class="book-cover" src="{{ asset($book->cover_path) }}" alt="{{ $book->title }}">
    </div>
    {{-- Details --}}
    <div class="col-7 ms-2 ps-5 position-relative">
        <h1 class="h4 fw-500 mb-1">{{ $book->title }}</h1>
        <h2 class="h5 fw-normal">{{ $book->authorsFormatted }}</h2>
        <h3 class="h6">{{ $book->category->title }}</h3>

        {{-- More details --}}
        <div class="my-4">
            <div>Parution : {{ $book->published_at->format('M Y') }}</div>
            <div>Pages : {{ $book->pages_num }}</div>
            <div>Ajouté par : {{ $book->user->fullname }}</div>
            <div>ISBN : {{ $book->isbn }}</div>
        </div>

        {{-- Pricing --}}
        <div class="d-flex flex-column align-items-end position-absolute end-0 bottom-0 me-2">
            <div class="my-2">
                <x-pricetag :amount="$book->price / 100" class="fw-bold fs-2"/>
            </div>
            <div>
                @cannot('delete', $book)
                    <x-add-to-cart :item="$book" />
                @else
                    <form action="{{ route('books.destroy', $book) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>           
                @endcannot
            </div>
        </div>
    </div>
</article>