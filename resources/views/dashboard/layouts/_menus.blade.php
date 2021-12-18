<div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
        {{ config('app.name') }}
    </a>
    <ul class="mt-6">
        <x-dashboard.menu-link route="dashboard.index">
            <i class="bi bi-house-door mx-1"></i>
            <span class="ml-3">Dashboard</span>
        </x-dashboard.menu-link>
        <x-dashboard.menu-link route="dashboard.categories.index">
            <i class="bi bi-tags-fill mx-1"></i>
            <span class="ml-3">Categories</span>
        </x-dashboard.menu-link>
    </ul>
</div>
