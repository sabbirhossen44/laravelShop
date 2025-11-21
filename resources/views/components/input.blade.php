<div class="form-group mb-3">
    @if (isset($label))
        <label for="{{ $name }}" class="form-label">{{ $label }}
            @if (!empty($required))<span class="text-danger"> *</span> @endif</label>
    @endif

    <input type="{{ $type }}"
        class="form-control {{ $class }}"
        name="{{ $name }}"
        id="{{ $id ?? $name }}"
        placeholder="{{ $placeholder }}"
        @if (!empty($value)) value="{{ $value }}" @endif
        @if (!empty($required)) required @endif
        @if (!empty($disabled)) disabled @endif
        @if (!empty($readonly)) readonly @endif
    />

    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
