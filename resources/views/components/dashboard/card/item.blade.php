@props(['title' => '', 'body'])

<div class="flex flex-wrap mb-6">
    <div class="w-full px-3">
        @if ($title)
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                {{ $title }}
            </h3>
        @endif
        <p class="text-gray-600 dark:text-gray-400">
            {{ $body ?? $slot }}
        </p>
    </div>
</div>
