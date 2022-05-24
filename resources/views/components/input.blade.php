<input type="{{$type}}" name="{{$name}}" class="form-control @error($name) is-invalid @enderror" value="{{ $value ?? @old($name) }}">
@error($name)
    <span class="text-danger small">{{ $message }}</span>
@enderror