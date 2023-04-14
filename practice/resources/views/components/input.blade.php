<div class="mb-3 col-6">
    <label for="" class="form-label">{{ $label }}</label>
    <span class="text-danger">*
        @error($name)
            {{ $message }}
        @enderror
    </span>
    <input type="{{ $type }}" name="{{ $name }}" class="form-control"
        value="{{ old($name) ?? $value}}">
</div>