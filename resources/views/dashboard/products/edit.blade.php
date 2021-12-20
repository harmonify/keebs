<x-app-layout title="Dashboard | Products">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit Product
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('dashboard.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-forms.input name="name" :old="$product->name" required></x-forms.input>
            <x-forms.input name="description" :old="$product->description" required></x-forms.input>
            <x-forms.input type="number" name="stock" :old="$product->stock" required></x-forms.input>
            <x-forms.input type="number" name="price" :old="$product->price" required></x-forms.input>
            <x-forms.select name="category_id" label="category" :items="$categories" :old="$product->category_id"
                required></x-forms.select>
            <x-forms.input-file name="image_path" label="image" :old="$product->image_url"></x-forms.input-file>

            <x-forms.submit></x-forms.submit>
        </form>
    </div>
</x-app-layout>
