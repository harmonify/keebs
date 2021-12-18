@props([
    'name',
    'type' => 'text',
    'label' => $name,
    'old' => '',
])

<label class="block text-sm mb-4">
    <x-forms.label name="{{ $label }}"></x-forms.label>

    <input type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $old) }}"
        autocomplete="off"
        placeholder="{{ ucfirst($label) }}"
        {{ $attributes }}
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input @error($name) border-red-600 focus:border-red-400 focus:shadow-outline-red @enderror"
    />

    <x-forms.error name="{{ $name }}"></x-forms.error>
</label>
