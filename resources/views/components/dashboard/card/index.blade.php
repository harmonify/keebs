@props(['image'])

{{-- Card --}}
<div class="flex flex-col max-w-3xl rounded shadow bg-white dark:bg-gray-800">
    {{-- Card Image --}}
    <div class="flex justify-center items-center w-full bg-gray-200 dark:bg-gray-700">
        <img src="{{ $image }}" class="block rounded min-h-full max-h-xl" alt="">
    </div>

    {{-- Card Body --}}
    <div class="w-full p-6 text-center">
        <div class="grid grid-cols-1 md:grid-cols-2">
            {{ $slot }}
        </div>
    </div>
</div>
