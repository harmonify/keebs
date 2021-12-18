@props([
    'name',
    'label',
    'items',
    'old' => '',
])

{{-- example --}}
{{-- <x-forms.select name="category_id" label="category" :items="\App\Models\Category::all()" required></x-forms.select> --}}

<label class="block text-sm mb-4">
    <x-forms.label name="{{ $label }}"></x-forms.label>

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $old) }}"
        placeholder="{{ ucfirst($label) }}"
        {{ $attributes }}
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray @error($name) border-red-600 focus:border-red-400 focus:shadow-outline-red @enderror"
    >
        <option value="">Choose a {{ $label }}</option>

        @foreach($items as $item)
            <option value="{{ $item->id }}" {{ old($name, $old) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
        @endforeach
    </select>

    <x-forms.error name="{{ $name }}"></x-forms.error>
</label>

