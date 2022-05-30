<select {{ $attributes->only(['name']) }}
        {{ $attributes->class(['form-select', 'is-invalid' => isset($name) && $errors->has($name)]) }}
        {{ $attributes->has('multiple') ? 'multiple' : ''}}>
    {{ $slot }}
</select>
@if(isset($name) && $errors->has($name))
    <span class="text-danger small">{{ $errors->first($name) }}</span>
@else
    @isset($description)
        <span class="small text-muted d-block mt-2">
            {{ $description }}
        </span>
    @endisset
@endif