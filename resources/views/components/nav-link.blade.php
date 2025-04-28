@props(['active'])

@php
$classes = ($active ?? false) ? 
    'inline-flex items-center hover:text-blue-900 text-sm text-blue-500 sm:w-auto transition-transform hover:scale-110':
    'inline-flex items center hover:text-blue-900 text-sm text-gray-500 sm:w-auto transition-transform hover:scale-110';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
