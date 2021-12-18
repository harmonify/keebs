@props([
    'tag' => null,
    'href' => null,
    'class' => null,
    'attributes' => [],
])

@php
    $base = "flex items-center justify-between px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple";
@endphp

@if ($tag == 'a')
    <a href="{{ $href }}" class="{{ $base }} {{ $class }}" {!! $attributes !!}>
        {{ $slot }}
    </a>
@elseif ($tag == 'button')
    <button class="{{ $base }} {{ $class }}" {!! $attributes !!}>
        {{ $slot }}
    </button>
@else
    <span class="{{ $base }} {{ $class }}" {!! $attributes !!}>
        {{ $slot }}
    </span>
@endif
