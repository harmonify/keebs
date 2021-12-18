@props(['heads', 'elements', 'actions' => [], 'paginator' => ''])

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap text-center">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    @foreach ($heads as $head)
                        <th class="px-4 py-3">{{ $head }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($elements as $element)
                    <tr class="text-gray-700 dark:text-gray-400">
                        @foreach ($element as $value)
                            <td class="px-4 py-3">{{ $value }}</td>
                        @endforeach
                        @if ($actions)
                            <td class="px-4 py-3">
                                <div class="flex justify-center items-center space-x-4 text-sm">
                                    @if (isset($actions['show']))
                                        <x-shared.icon tag="a" href="{{ route($actions['show'], $element['id']) }}"
                                            aria-label="Show">
                                            <i class="bi bi-eye"></i>
                                        </x-shared.icon>
                                    @endif
                                    @if (isset($actions['edit']))
                                        <x-shared.icon tag="a" href="{{ route($actions['edit'], $element['id']) }}"
                                            aria-label="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </x-shared.icon>
                                    @endif
                                    @if (isset($actions['delete']))
                                        <form action="{{ route($actions['delete'], $element['id']) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <x-shared.icon tag="button" type="submit" onclick="return confirm('Are you sure to delete this?')"
                                                aria-label="Delete">
                                                <i class="bi bi-trash"></i>
                                            </x-shared.icon>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $paginator ? $paginator->links('components.shared.pagination') : '' }}
</div>

