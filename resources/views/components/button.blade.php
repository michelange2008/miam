@php

$iconClass = 'h-5 w-5';
$iconSpacing = $iconPosition === 'left' ? 'mr-2' : 'ml-2';
$url = $routeUrl();
@endphp

@php
// classes "de base" littérales
$baseClasses = 'inline-flex text-xs md:text-base px-2 py-1  items-center justify-center rounded-md font-medium text-gray-700 hover:text-white focus:outline-none focus:ring-2 transition-colors duration-150 disabled:opacity-50 disabled:cursor-not-allowed';

// variantes écrites *littéralement* (Tailwind les verra au scan)
$variantClasses = [
    'gray' => 'border border-gray-400 bg-gray-200 hover:bg-gray-700 active:bg-gray-300 focus:ring-gray-400 text-gray-700',
    'green' => 'border border-vert bg-vertclair hover:bg-vertfonce active:bg-vert focus:ring-vertfonce',
    'red' => 'border border-red-400 bg-red-200 hover:bg-red-700 active:bg-red-500 focus:ring-red-500',
    'yellow' => 'border border-jaune bg-jauneclair hover:bg-jaunefonce active:bg-jaune focus:ring-jaunefonce',
    'orange' => 'border border-orange bg-orangeclair hover:bg-orangefonce active:bg-orange focus:ring-orangefonce',
];
@endphp

@if ($url)
    <a href="{{ $url }}" @if ($newTab) target="_blank" rel="noopener noreferrer" @endif
        {{ $attributes->class([
            $baseClasses,
            $variantClasses[$variant] ?? $variantClasses['gray'],
        ]) }}>
        @if ($icon && $iconPosition === 'left')
            <x-icon :name="$icon" class="{{ $iconClass }} {{ $iconSpacing }}" />
        @endif

        {{ $slot }}

        @if ($icon && $iconPosition === 'right')
            <x-icon :name="$icon" class="{{ $iconClass }} {{ $iconSpacing }}" />
        @endif
    </a>
@else
    <button
        {{ $attributes->class([
            $baseClasses,
            $variantClasses[$variant] ?? $variantClasses['gray'],
        ]) }}
        type="{{ $attributes->get('type', 'button') }}"
        @if ($disabled) disabled @endif
    >
        @if ($icon && $iconPosition === 'left')
            <x-icon :name="$icon" class="{{ $iconClass }} {{ $iconSpacing }}" />
        @endif

        {{ $slot }}

        @if ($icon && $iconPosition === 'right')
            <x-icon :name="$icon" class="{{ $iconClass }} {{ $iconSpacing }}" />
        @endif
    </button>
@endif
