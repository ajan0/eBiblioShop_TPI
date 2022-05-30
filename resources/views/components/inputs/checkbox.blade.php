<div class="form-check">
    <input
        type="checkbox"
        {{ $attributes->class(['form-check-input', 'is-invalid' => isset($name) && $errors->has($name)]) }}
        {{ $attributes->only(['name']) }}
        {{ $attributes->has('disabled') && $attributes->get('disabled') ? 'disabled' : '' }}
    >
    @isset($slot)
        <label {{ $attributes->class(['form-check-label', 'small', 'text-danger' => isset($name) && $errors->has($name)]) }}>
            {{ $slot }}
        </label>
    @endisset
    @if(isset($name) && $errors->has($name))
        <span class="text-danger small">{{ $errors->first($name) }}</span>
    @else
        @isset($description)
            <span class="small text-muted d-block mt-2">
                {{ $description }}
            </span>
        @endisset
    @endif
</div>