@if (isset($multiline) && $multiline)
    <span id="{{ $id ?? '' }}" data-address-id="{{ $address->id }}">{!! sprintf('%s<br>%s %d<br>%s %s', $address->fullname, $address->street, $address->street_number, $address->postcode, $address->city); !!}</span>
@else
    {{ $address->full }}
@endif