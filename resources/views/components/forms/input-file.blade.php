@props(['name', 'label' => $name, 'old' => ''])

<label class="block text-sm mb-4">
    <x-forms.label name="{{ $label }}"></x-forms.label>

    <div class="inline-block w-full py-2 mt-1 mb-4 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray border border-gray-200 rounded @error($name) border-red-600 focus:border-red-400 focus:shadow-outline-red @enderror">
        <span class="px-3 py-2 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">Choose file</span>
        <span id="{{ $name }}-selected" class="ml-3">No file chosen</span>
    </div>

    <input id="{{ $name }}" name="{{ $name }}" type="file" class="sr-only" {{ $attributes }} />

    <img id="{{ $name }}-preview" class="block rounded" src="{{ asset(old($name, $old)) }}" alt="" width="500" />

    <x-forms.error name="{{ $name }}"></x-forms.error>
</label>

<script async="false">
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('{{ $name }}');
        const selected = document.getElementById('{{ $name }}-selected');
        const preview = document.getElementById('{{ $name }}-preview');

        input.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                selected.innerHTML = file.name;
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    preview.src = reader.result;
                });
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
            }
        });
    });
</script>
