<x-app-layout title="Dashboard | Products">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Product
    </h2>

    {{-- Card --}}
    <x-dashboard.card :image="$product->image_url">
        <x-slot name="body">
            <x-dashboard.card.item>
                <x-slot name="title">
                    {{ $product->name }}
                </x-slot>
                <x-slot name="body">
                    {{ $product->description }}
                </x-slot>
            </x-dashboard.card.item>
            <x-dashboard.card.item>
                <x-slot name="title">
                    Category
                </x-slot>
                <x-slot name="body">
                    {{ $product->category->name }}
                </x-slot>
            </x-dashboard.card.item>
            <x-dashboard.card.item>
                <x-slot name="title">
                    Stock
                </x-slot>
                <x-slot name="body">
                    {{ $product->stock }}
                </x-slot>
            </x-dashboard.card.item>
            <x-dashboard.card.item>
                <x-slot name="title">
                    Price
                </x-slot>
                <x-slot name="body">
                    {{ $product->price }}
                </x-slot>
            </x-dashboard.card.item>
            <x-dashboard.card.item>
                <x-slot name="title">
                    Created At
                </x-slot>
                <x-slot name="body">
                    {{ $product->created_at }}
                </x-slot>
            </x-dashboard.card.item>
            <x-dashboard.card.item>
                <x-slot name="title">
                    Updated At
                </x-slot>
                <x-slot name="body">
                    {{ $product->updated_at }}
                </x-slot>
            </x-dashboard.card.item>
        </x-slot>

        <x-slot name="footer">
            <x-shared.button tag="a" href="{{ route('dashboard.products.edit', $product) }}" aria-label="Edit">
                Edit
                <i class="bi bi-pencil ml-2"></i>
            </x-shared.button>
            <form action="{{ route('dashboard.products.destroy', $product) }}" method="POST">
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
