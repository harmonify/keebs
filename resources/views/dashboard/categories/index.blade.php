<x-app-layout title="Dashboard | Categories">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Categories
        </h2>

        {{-- Tables --}}
        @php
            $heads = ['ID', 'Name', 'Alias', 'Created At', 'Updated At', 'Actions'];
            $actions = [
                'show' => 'dashboard.categories.show',
                'edit' => 'dashboard.categories.edit',
                'delete' => 'dashboard.categories.destroy',
            ];
            $elements = $categories->makeHidden('description')->toArray();
        @endphp
        <x-shared.table :heads="$heads" :actions="$actions" :elements="$elements" :paginator="$categories">
        </x-shared.table>
    </div>
</x-app-layout>
