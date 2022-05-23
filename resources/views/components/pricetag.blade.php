@php
    $pricedata = explode('.', (string) $amount)
@endphp

@if($pricedata[0] > 0 )
    <span class="{{ $attributes['class'] }}">
        <span class="ps-1">CHF</span>
        {{ $pricedata[0] }}.@if ($pricedata[1] == 0)&ndash;@else<sup style="font-size: 0.65em;">{{ $pricedata[1] }}</sup>@endif
    </span>
@else
    <span class="{{ $attributes['class'] }}">Gratuit</span>
@endif
