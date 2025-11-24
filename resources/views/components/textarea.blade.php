<div>
    @if (isset($label))
        <label for="{{ $name }}" class="form-label">{{ $label }}
            @if (!empty($required))<span class="text-danger"> *</span> @endif</label>
    @endif

    <textarea name="{{ $name }}" id="{{ $id ?? $name }}" class="form-control {{ $class }}"
        @if (!empty($required)) required @endif @if (!empty($disabled)) disabled @endif placeholder="{{ $placeholder }}" cols="" rows="{{ $rows }}"></textarea>

    {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}


    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
