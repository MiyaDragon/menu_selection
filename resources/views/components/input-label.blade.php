@props(['value', 'required'])

<label {{ $attributes->merge(['class' => 'block mb-2 text-sm font-medium text-gray-900']) }}>
    {{ $value ?? $slot }}
    @if ($required)
        <span class="ms-1"><small class="text-red-700">必須</small></span>
    @endif
</label>
