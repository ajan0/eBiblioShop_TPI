<article class="row border-bottom py-5">
    {{-- Description --}}
    <div class="col-2">
        <a href="{{ route('books.show', $book) }}">
            <img class="w-100 shadow-lg" src="{{ asset($book->cover_path) }}" alt="{{ $book->title }}">        
        </a>
    </div>
    <div class="col-5 position-relative">
        <h1 class="h5 fw-500 mb-1">
            <a class="text-body" href="{{ route('books.show', $book) }}">
                {{ $book->title }}
            </a>
        </h1>        
        <h2 class="h6 fw-normal">{{ $book->authorsFormatted }}</h2>
        <p class="small">{{ Str::words($book->description, 35) }}</p>
        <div class="pt-1 position-absolute bottom-0">
            <p class="small text-muted m-0">
                ISBN: {{ $book->isbn }}<br>
                {{ $book->pages_num }} pages
            </p>    
        </div>
    </div>
    {{-- Price --}}
    <div class="col-3 px-4 d-flex flex-column justify-content-center align-items-center">
        <x-pricetag :amount="$book->price / 100" class="fw-bold fs-3 text-center my-2" />
        <x-add-to-cart :item="$book" icon="shopping_cart" />
        <x-add-to-cart :item="$book" instance="wishlist" icon="push_pin" text="Sauvgarder" :outline="true" class="my-2" />
    </div>
</article>