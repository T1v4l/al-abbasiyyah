@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 text-start text-base font-bold text-white bg-brand-teal rounded-lg focus:outline-none transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 text-start text-base font-semibold text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>