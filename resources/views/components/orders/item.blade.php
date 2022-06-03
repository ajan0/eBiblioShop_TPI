@php
    $book = $orderItem->book;
@endphp

<article class="border-top">
    <div class="row py-3 me-3">
        {{-- Description --}}
        <div class="col-1">
            <a href="{{ route('books.show', $book) }}">
                <img class="w-100" src="{{ asset($book->cover_path) }}" alt="{{ asset($book->title) }}">        
            </a>
        </div>
        <div class="col-4">
            <h1 class="h6 mb-1">
                <a href="{{ route('books.show', $book) }}">{{ $book->title }}</a>
            </h1>
            <div class="fs-6">{{ $book->authorsFormatted }}</div>
            <div class="small text-muted pt-1">
                <p class="small m-0">
                    ISBN: {{ $book->isbn }}<br>
                    {{ $book->pages_num }} pages
                </p>    
            </div>
        </div>
        {{-- Quantity --}}
        <div class="col-1 text-center">
            {{ $orderItem->quantity }}
        </div>
        {{-- total --}}
        <div class="col-2 text-center">
            <x-pricetag :amount="$orderItem->total / 100" />
        </div>
        {{-- State --}}
        <div class="col-2 text-center">
            {{ trans($orderItem->status) }}
        </div>
    </div>    
</article>