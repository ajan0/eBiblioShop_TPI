@php
    $pricedata = explode('.', (string) $amount);
    $elevatedCents = $elevatedCents ?? false;
    $showFreeTag = $showFreeTag ?? true;
@endphp

@if($pricedata[0] > 0 )
    <span class="{{ $attributes['class'] }}">
        <span class="ps-1">CHF</span>
        @if ($elevatedCents)
            {{ $pricedata[0] }}.@if (count($pricedata) > 1)<sup style="font-size: 0.65em;">{{ $pricedata[1] }}</sup>@else&ndash;@endif
        @else
            {{ $pricedata[0] }}.@if (count($pricedata) > 1)<span>{{ $pricedata[1] }}</span>@else&ndash;@endif
        @endif
    </span>
@else
    <span class="{{ $attributes['class'] }}">
        @if ($showFreeTag)
            Gratuit
        @else
            CHF {{ $amount }}
        @endif
    </span>
@endif
