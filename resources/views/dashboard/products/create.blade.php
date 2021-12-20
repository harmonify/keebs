<x-app-layout title="Dashboard | Products">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Create a New Product
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-forms.input name="name" required></x-forms.input>
            <x-forms.input name="description" required></x-forms.input>
            <x-forms.input type="number" name="stock" required></x-forms.input>
            <x-forms.input type="number" name="price" required></x-forms.input>
            <x-forms.select name="category_id" label="category" :items="$categories" required></x-forms.select>
            <x-forms.input-file name="image_path" label="image"></x-forms.input-file>

            <x-forms.submit></x-forms.submit>
        </form>
    </div>
</x-app-layout>
