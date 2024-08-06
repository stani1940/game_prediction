@props(['value'])

<label {{ $attributes->merge(['class' => 'text-white text-lg text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
