@props(['route'])

<li class="relative px-6 py-3">
    {!! request()->routeIs($route) ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
    <a data-turbolinks-action="replace"
        class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
        href="{{ route($route) }}">
        {{ $slot }}
    </a>
</li>
