@php
$base = 'inline-flex items-center justify-center rounded-md font-medium focus:outline-none focus:ring-2 transition-colors duration-150 disabled:opacity-50 disabled:cursor-not-allowed';

$variants = [
    'gray' => 'border border-gray-400 text-gray-700 bg-white hover:bg-gray-100 active:bg-gray-300 focus:ring-gray-400',
    'green' => 'border border-green-600 text-white bg-green-600 hover:bg-green-700 active:bg-green-800 focus:ring-green-500',
    'red' => 'border border-red-600 text-white bg-red-600 hover:bg-red-700 active:bg-red-800 focus:ring-red-500',
];

$sizes = [
    'sm' => 'text-sm px-2 py-1',
    'md' => 'text-base px-4 py-2',
    'lg' => 'text-lg px-6 py-3',
];

$url = $routeUrl();

// Gérer l'espacement de l'icône
$iconClass = 'h-5 w-5';
$iconSpacing = $iconPosition === 'left' ? 'mr-2' : 'ml-2';
@endphp

@if ($url)
    <a href="{{ $url }}"
       @if($newTab) target="_blank" rel="noopener noreferrer" @endif
       {{ $attributes->merge([
           'class' => "$base " . ($variants[$variant] ?? $variants['gray']) . ' ' . ($sizes[$size] ?? $sizes['md']),
       ]) }}>
        @if($icon && $iconPosition === 'left')
            <x-icon name="{{ $icon }}" class="{{ $iconClass }} {{ $iconSpacing }}" />
        @endif

        {{ $slot }}

        @if($icon && $iconPosition === 'right')
            <x-icon name="{{ $icon }}" class="{{ $iconClass }} {{ $iconSpacing }}" />
        @endif
    </a>
@else
    <button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => "$base " . ($variants[$variant] ?? $variants['gray']) . ' ' . ($sizes[$size] ?? $sizes['md']),
        ]) }}
        @if($disabled) disabled @endif
    >
        @if($icon && $iconPosition === 'left')
            <x-icon :name=$icon class="{{ $iconClass }} {{ $iconSpacing }}" />
        @endif

        {{ $slot }}

        @if($icon && $iconPosition === 'right')
            <x-icon name="{{ $icon }}" class="{{ $iconClass }} {{ $iconSpacing }}" />
        @endif
    </button>
@endif
