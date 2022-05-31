@php
    $readonly = $readonly ?? false;
@endphp
@if ($type === 'textarea')
    <textarea   type="{{ $type }}"
                name="{{ $name }}"
                class="form-control @error($name) is-invalid @enderror"
                @if($attributes->has('placeholder')) placeholder="{{ $attributes->get('placeholder')}}" @endif
                rows="{{ $rows ?? 5 }}"
    >
        {{ $value ?? old($name) }}
    </textarea>
    
@else
    <input  type="{{ $type }}"
            name="{{ $name }}"
            class="form-control @error($name) is-invalid @enderror"
            value="{{ $value ?? old($name) }}"
            placeholder="{{ $attributes->get('placeholder')}}"
            {{ $readonly ? 'readonly' : null }}
    >
@endif
@error($name)
    <span class="text-danger small">{{ $message }}</span>
@enderror