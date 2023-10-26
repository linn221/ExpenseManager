<table class=" w-50">
    <thead>
        <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
            <th class="px-4 py-3">Id</th>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Price</th>
            <th class="px-4 py-3">Category</th>
            <th class="px-4 py-3">Control</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y">
        @forelse($items as $item)
            <tr class="text-gray-700">
                <td class="px-4 py-3 ">
                    <a href="{{ route('item.show', $item) }}">
                        {{ $item->id }}
                    </a>
                </td>
                <td class="px-4 py-3 ">
                    {{ $item->name }}
                </td>
                <td class="px-4 py-3 ">
                    {{ $item->price }}
                </td>
                <td class="px-4 py-3 ">
                    {{ $item->category->name }}
                </td>
                <td class="px-4 py-3 ">
                    <a href="{{ route('item.edit', $item) }}">
                        <x-secondary-button>
                            Edit
                        </x-secondary-button>
                    </a>
                    <form action="{{ route('item.destroy', $item) }}" method="post" class="">
                        @csrf
                        @method('delete')
                        <x-danger-button>
                            Delete
                        </x-danger-button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="px-4 py-3" colspan="4">No items found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
