<table class=" w-50">
    <thead>
        <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
            <th class="px-4 py-3">
                <a href="{{ request()->fullUrlWithQuery(['order' => 'amount']) }}">
                    Amount
                </a>
            </th>
            <th class="px-4 py-3">
                <a href="{{ request()->fullUrlWithQuery(['order' => 'label']) }}">
                    Label
                </a>
            </th>
            {{-- @update order by date feature --}}
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Control</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y">
        @forelse($incomes as $income)
            {{-- delete form --}}
            <form action="{{ route('income.destroy', $income) }}" method="post" id="{{ 'delete-' . $income->id }}">
                @csrf
                @method('delete')
            </form>

            <tr class="text-gray-700">
                <td class="px-4 py-3 ">
                    <a href="{{ route('income.show', $income) }}">
                        {{ $income->amount }}
                    </a>
                </td>
                <td class="px-4 py-3 ">
                    {{ $income->label }}
                </td>
                <td class="px-4 py-3 ">
                    {{ $income->date }}
                </td>
                <td class="px-4 py-3 ">
                    <a href="{{ route('income.edit', $income) }}">
                        <x-secondary-button>
                            Edit
                        </x-secondary-button>
                    </a>
                    <x-danger-button :form="'delete-' . $income->id">
                        Delete
                    </x-danger-button>
                </td>
            </tr>
        @empty
            <tr>
                <td class="px-4 py-3" colspan="4">No incomes yet</td>
            </tr>
        @endforelse
    </tbody>
</table>
