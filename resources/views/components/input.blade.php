@props(['type' => 'text', 'name' => '', 'label' => '', 'placeholder' => '', 'oldValue' => ''])

<div class="mb-4">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        value="{{ old($name, $oldValue) }}" id="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
