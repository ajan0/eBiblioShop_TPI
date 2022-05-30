<article class="row">
    {{-- Cover --}}
    <div class="col-3">
        <a href="{{ route('books.show', $book) }}">
            <img class="w-100" src="{{ asset($book->cover_path) }}" alt="{{ 'title' }}">
        </a>
    </div>
    {{-- Details --}}
    <div class="col-6 position-relative">
        <h1 class="h4 fw-normal">
            <a class="text-body" href="{{ route('books.show', $book) }}">
                {{ $book->title }}
            </a>
        </h1>
        <h2 class="h5 fw-normal">{{ $book->authorsFormatted }}</h2>
        <p>{{ Str::words($book->description, 60) }}</p>
        <span class="position-absolute bottom-0 small text-muted">
            <span>EAN: {{ $book->isbn }}</span><br>
            <span>{{ $book->pages_num }} pages, parution: {{ $book->published_at->format('M Y') }}</span>
        </span>
    </div>
    {{-- Pricing --}}
    <div class="col-3 d-flex justify-content-end align-items-center">
        <div class="d-flex flex-column">
            <div class="my-2">
                <x-pricetag :amount="$book->price / 100" class="fw-bold fs-2"/>
            </div>
            <x-add-to-cart :item="$book" />
        </div>
    </div>
</article>