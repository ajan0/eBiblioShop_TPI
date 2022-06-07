@php
    $book = $orderItem->book;
    $readonly = $readonly ?? true;
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
            Qty: {{ $orderItem->quantity }}
        </div>
        {{-- total --}}
        <div class="col-2 text-center">
            <x-pricetag :amount="$orderItem->total / 100" />
        </div>
        {{-- State --}}
        <div class="col-3 text-center">
            {{-- If the user can modify the state. --}}
            @if ($orderItem->status === 'done')
                <span class="text-success">{{ trans($orderItem->status) }}</span>
            @elseif (auth()->user()->can('update-shipped', $orderItem))
                <form class="order-status-select" action="{{ route('orders.updateItem', $orderItem) }}" method="post">
                    @csrf
                    @method('PUT')
                    <x-inputs.select name="status">
                        <option value="waiting" @selected($orderItem->status === 'waiting') disabled>{{ trans('waiting') }}</option>
                        <option value="shipped" @selected($orderItem->status === 'shipped') @disabled($orderItem->status === 'shipped')>{{ trans('shipped') }}</option>
                    </x-inputs.select>
                </form>
            @elseif (auth()->user()->can('update-done', $orderItem) && $orderItem->status === 'shipped')
            <form class="order-status-select" action="{{ route('orders.updateItem', $orderItem) }}" method="post">
                @csrf
                @method('PUT')
                <x-inputs.select name="status">
                    <option value="waiting" @selected($orderItem->status === 'waiting') disabled>{{ trans('waiting') }}</option>
                    <option value="shipped" selected disabled>{{ trans('shipped') }}</option>
                    <option value="done" @selected($orderItem->status === 'done')>{{ trans('done') }}</option>
                </x-inputs.select>
            </form>
            @else
                {{ trans($orderItem->status) }}
            @endif
        </div>
    </div>    
</article>
@once('scripts')
<script>
    document.querySelectorAll('.order-status-select').forEach(select => {
        select.onchange = (e) => {
            e.srcElement.form.submit();
        }
    });
</script>
@endonce