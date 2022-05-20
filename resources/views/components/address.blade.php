@if (isset($multiline) && $multiline)
    {!! sprintf('%s<br>%s %d<br>%s %s', $address->user->fullname, $address->street, $address->street_number, $address->zip_code, $address->city); !!}
@else
    {{ $address->full }}
@endif