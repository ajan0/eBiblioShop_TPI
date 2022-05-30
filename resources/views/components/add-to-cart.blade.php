@php
    $text = $text ?? 'Ajouter au panier d\'achat';
@endphp
<form action="{{ route('cart.store', $item) }}" method="post" class="{{ $attributes['class'] }}">
    @csrf
    <button type="submit" class="btn btn-{{ isset($outline) && $outline ? 'outline-' : '' }}primary d-flex justify-content-center align-items-center">
        @isset($icon)
            <span class="material-icons me-1">{{ $icon }}</span>
        @endisset
        <span>{{ $text }}</span>
    </button>
</form>