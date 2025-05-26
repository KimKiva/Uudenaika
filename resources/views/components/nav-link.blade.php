@props(['active', 'navigate'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center hover:text-blue-900 text-sm text-blue-500 sm:w-auto transition-transform hover:scale-110'
            : 'inline-flex items center hover:text-blue-900 text-sm text-gray-500 sm:w-auto transition-transform hover:scale-110';
@endphp

<a {{ $navigate ?? true ? 'wire:navigate' : '' }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
