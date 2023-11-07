<table class=" w-50">
    <thead>
        <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
            <th class="px-4 py-3">
                <a
                    href="{{ request()->fullUrlWithQuery(['order' => 'name']) }}{{ !request()->has('desc') ? '&desc' : '' }}">
                    Name
                </a>
            </th>
            <th class="px-4 py-3">
                <a
                    href="{{ request()->fullUrlWithQuery(['order' => 'price']) }}{{ !request()->has('desc') ? '&desc' : '' }}">
                    Price
                </a>
            </th>
            <th class="px-4 py-3">
                <a
                    href="{{ request()->fullUrlWithQuery(['order' => 'category_id']) }}{{ !request()->has('desc') ? '&desc' : '' }}">
                    Category
                </a>
            </th>
            <th class="px-4 py-3">Expenses</th>
            <th class="px-4 py-3">Control</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y">
        @forelse($items as $item)
            {{-- delete form --}}
            <form action="{{ route('item.destroy', $item) }}" method="post" id="{{ 'delete-' . $item->id }}">
                @csrf
                @method('delete')
            </form>

            <tr @class(['text-gray-700', 'bg-blue-100' => $item->trashed()])>
                <td class="px-4 py-3 ">
                    <a href="{{ route('item.show', $item) }}">
                        {{ $item->name }}
                    </a>
                </td>
                <td class="px-4 py-3 ">
                    {{ $item->price }}
                </td>
                <td class="px-4 py-3 ">
                    {{ $item->category->name }}
                </td>
                <td class="px-4 py-3 ">
                    {{ $item->expenses_count }}
                </td>
                <td class="px-4 py-3 ">
                    @if ($item->trashed())
                        <form action="{{ route('item.restore', $item) }}" method="post"
                            id="{{ 'restore-' . $item->id }}">
                            @csrf
                        </form>
                        <form action="{{ route('item.forceDelete', $item) }}" method="post"
                            id="{{ 'forceDelete-' . $item->id }}">
                            @csrf
                        </form>

                        <x-primary-button :form="'restore-' . $item->id">
                            Restore
                        </x-primary-button>
                        <x-danger-button :form="'forceDelete-' . $item->id">
                            Force Delete
                        </x-danger-button>
                    @else
                        <a href="{{ route('item.edit', $item) }}">
                            <x-secondary-button>
                                Edit
                            </x-secondary-button>
                        </a>
                        <x-danger-button :form="'delete-' . $item->id">
                            Delete
                        </x-danger-button>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td class="px-4 py-3" colspan="4">No items found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
