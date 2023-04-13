<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>
    <span class="text-danger">
        @error($name)
            {{ $message }}
        @enderror
    </span>
    <input type="{{ $type }}" name="{{ $name }}" id="" class="form-control" value="{{ old($name) }}">
</div>
