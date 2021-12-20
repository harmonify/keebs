<x-app-layout title="Dashboard">
    <div class="container grid p-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <x-dashboard.resource-card title="Total Categories" :body="$categoriesCount">
                <x-slot name="icon" class="text-orange-500 bg-orange-100 dark:text-orange-100 dark:bg-orange-500">
                    <i class="bi bi-tags"></i>
                </x-slot>
            </x-dashboard.resource-card>

            <x-dashboard.resource-card title="Total Products" :body="$productsCount">
                <x-slot name="icon" class="text-blue-500 bg-blue-100 dark:text-blue-100 dark:bg-blue-500">
                    <i class="bi bi-cart4"></i>
                </x-slot>
            </x-dashboard.resource-card>
        </div>
</x-app-layout>

