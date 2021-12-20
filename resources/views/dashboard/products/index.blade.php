<x-app-layout title="Dashboard | Products">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Products
    </h2>

    <div>
        <x-shared.button tag="a" href="{{ route('dashboard.products.create') }}" class="float-left gap-x-2 mb-6">
            <i class="bi bi-plus-lg"></i>
            Create a New Product
        </x-shared.button>
    </div>

    {{-- Tables --}}
    @php
        $heads = ['ID', 'Name', 'Category Name', 'Stock', 'Price', 'Actions'];
        $actions = [
            'show' => 'dashboard.products.show',
            'edit' => 'dashboard.products.edit',
            'delete' => 'dashboard.products.destroy',
        ];
        $elements = [];
        foreach ($products as $product) {
            $elements[] = [
                'id' => $product->id,
                'name' => $product->name,
                'category_name' => $product->category->name,
                'stock' => $product->stock,
                'price' => $product->price,
            ];
        }
    @endphp
    <x-shared.table :heads="$heads" :actions="$actions" :elements="$elements" :paginator="$products">
    </x-shared.table>
</x-app-layout>


@if (session()->has('success'))
    <div class="bg-green-200 p-3 fixed bottom-2 right-10 rounded" onclick="this.style.display = 'none'">
        {{ session('success') ?? 'No message' }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-200 p-3 fixed bottom-2 right-10 rounded" onclick="this.style.display = 'none'">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
