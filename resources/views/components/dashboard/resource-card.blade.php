@props(['title', 'icon', 'body'])

<div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    {{-- to extend class attribute with slot name="icon" attribute --}}
    <div {{ $icon->attributes->class('px-4 py-3 mr-4 rounded-full') }}>
        {{ $icon }}
    </div>

    <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            {{ $title }}
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{ $body }}
        </p>
    </div>
</div>
