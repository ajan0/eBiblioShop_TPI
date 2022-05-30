<textarea  type="number"
        {{ $attributes->class(['form-control', 'is-invalid' => isset($name) && $errors->has($name)]) }}
        {{ $attributes->only(['min', 'max', 'cols', 'rows', 'name', 'placeholder']) }}
        {{ $attributes->has('readonly') && $attributes->get('readonly') ? 'readonly' : '' }}
        {{ $attributes->has('disabled') && $attributes->get('disabled') ? 'disabled' : '' }}
        >{{ isset($name) ? old($name, $attributes->get('value') ?? '') : null }}</textarea>
@if(isset($name) && $errors->has($name))
    <span class="text-danger small">{{ $errors->first($name) }}</span>
@else
    @isset($description)
        <span class="small text-muted d-block mt-2">
            {{ $description }}
        </span>
    @endisset
@endif