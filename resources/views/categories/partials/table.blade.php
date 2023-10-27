<table class=" w-50">
    <thead>
        <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Items</th>
            <th class="px-4 py-3">Control</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y">
        @forelse($categories as $category)
            <form action="{{ route('category.destroy', $category) }}" method="post" id="{{ 'delete-' . $category->id }}">
                @csrf
                @method('delete')
            </form>
            <tr class="text-gray-700">
                <td class="px-4 py-3 ">
                    {{ $category->name }}
                </td>
                <td class="px-4 py-3 ">
                    {{ $category->items_count }}
                </td>
                <td class="px-4 py-3 ">
                    <a href="{{ route('category.edit', $category) }}">
                        <x-secondary-button>
                            Edit
                        </x-secondary-button>
                    </a>
                        <x-danger-button :form="'delete-'.$category->id">
                            Delete
                        </x-danger-button>
                </td>
            </tr>
        @empty
            <tr>
                <td class="px-4 py-3" colspan="4">No categories found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
