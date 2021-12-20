<x-app-layout title="Dashboard | Categories">
    <div class="container grid p-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Create a New Category
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('dashboard.categories.store') }}" method="POST">
                @csrf

                <x-forms.input name="name" required></x-forms.input>
                <x-forms.input name="alias" required></x-forms.input>
                <x-forms.input name="description" required></x-forms.input>

                <x-forms.submit></x-forms.submit>
            </form>
        </div>
    </div>
</x-app-layout>
