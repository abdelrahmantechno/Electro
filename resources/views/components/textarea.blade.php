@props(['name' => '', 'label' => '', 'placeholder' => '', 'value' => '', 'oldValue' => ''])

<div class="mb-4">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}"
        class="form-control @error($name) is-invalid @enderror">{{ old($name, $oldValue) }}</textarea>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
