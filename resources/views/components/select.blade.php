@props(['name' => '', 'options' => [], 'label' => '', 'placeholder' => '', 'oldValue' => ''])

<div class="mb-4">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror">

        <option value="">-- {{ __('Select Role') }} --</option>

        @foreach ($options as $value => $text)
            <option value="{{ $value }}" {{ old($name, $oldValue) == $value ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
