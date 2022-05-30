<article class="border-bottom py-3 me-3">
    <div class="row">    
        {{-- Description --}}
        <div class="col-1">
            <img class="w-100" src="{{ asset($book->cover_path) }}" alt="{{ $book->title }}">
        </div>
        <div class="col-4">
            <h1 class="h6 mb-1">{{ $book->title }}</h1>
            <div class="fs-6">{{ $book->authorsFormatted }}</div>
            <div class="small text-muted pt-1">
                <p class="small m-0">
                    ISBN: {{ $book->isbn }}<br>
                    {{ $book->pages_num }} pages
                </p>    
            </div>
        </div>
        {{-- Quantity + & - --}}
        <div class="col-2">
            <div class="d-flex justify-content-center">
                <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="qty" value="{{ $item->qty - 1 }}">
                    <button class="btn btn-sm btn-outline-primary d-flex p-1" type="submit">
                        <span class="material-icons md-18">remove</span>
                    </button>                            
                </form>
                
                <input class="text-center mx-1" type="text" value="{{ $item->qty }}" style="width: 2rem;" disabled>
                
                <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="qty" value="{{ $item->qty + 1 }}">
                    <button class="btn btn-sm btn-outline-primary d-flex p-1" type="submit">
                        <span class="material-icons md-18">add</span>
                    </button>                            
                </form>
            </div>
        </div>
        {{-- Price --}}
        <div class="col-2">
            <div class="d-flex justify-content-center">
                <x-pricetag :amount="$item->price()" />
            </div>
        </div>
        {{-- Subtotal --}}
        <div class="col-2">
            <div class="d-flex justify-content-center">
                <x-pricetag :amount="$item->subtotal()" />
            </div>
        </div>
        {{-- Delete --}}
        <div class="col-1">
            <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger d-flex p-1">
                    <span class="material-icons md-18">delete</span>
                </button>
            </form>
        </div>
    </div>
</article>
