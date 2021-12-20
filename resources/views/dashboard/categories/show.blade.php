<x-app-layout title="Dashboard | Categories">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Category
    </h2>

    {{-- Card --}}
    <x-dashboard.card>
        <x-slot name="body">
            <x-dashboard.card.item>
                <x-slot name="title">
                    {{ $category->name }}
                </x-slot>
                <x-slot name="body">
                    {{ $category->description }}
                </x-slot>
            </x-dashboard.card.item>

            <x-dashboard.card.item>
                <x-slot name="title">
                    Alias
                </x-slot>
                <x-slot name="body">
                    {{ $category->alias }}
                </x-slot>
            </x-dashboard.card.item>

            <x-dashboard.card.item>
                <x-slot name="title">
                    Created At
                </x-slot>
                <x-slot name="body">
                    {{ $category->created_at }}
                </x-slot>
            </x-dashboard.card.item>

            <x-dashboard.card.item>
                <x-slot name="title">
                    Updated At
                </x-slot>
                <x-slot name="body">
                    {{ $category->updated_at }}
                </x-slot>
            </x-dashboard.card.item>
        </x-slot>

        <x-slot name="footer">
            <x-shared.button tag="a" href="{{ route('dashboard.categories.edit', $category) }}" aria-label="Edit">
                Edit
                <i class="bi bi-pencil ml-2"></i>
            </x-shared.button>
            <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-shared.button tag="button" type="submit" onclick="return confirm('Are you sure to delete this?')"
                    aria-label="Delete">
                    Delete
                    <i class="bi bi-trash ml-2"></i>
                </x-shared.button>
            </form>
        </x-slot>
    </x-dashboard.card>
</x-app-layout>
