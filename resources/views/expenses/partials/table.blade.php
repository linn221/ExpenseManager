<table class=" w-full">
    <thead>
        <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
            <th class="px-4 py-3">Item</th>
            <th class="px-4 py-3">Qty</th>
            <th class="px-4 py-3">Cost</th>
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Note</th>

            <th class="px-4 py-3">Control</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y">
        @forelse($expenses as $expense)
        {{-- delete form --}}
            <form action="{{ route('expense.destroy', $expense) }}" method="post" id="{{ 'delete-' . $expense->id }}">
                @csrf
                @method('delete')
            </form>

            <tr class="text-gray-700">
                <td class="px-4 py-3 ">
                    <a href="{{ route('expense.show', $expense) }}">
                        {{ $expense->item->name }}
                    </a>
                </td>
                <td class="px-4 py-3 ">
                    {{ $expense->quantity }}
                </td>
                <td class="px-4 py-3 ">
                    {{ $expense->cost }}
                </td>
                <td class="px-4 py-3 ">
                    {{ $expense->date }}
                </td>
                <td class="px-4 py-3 ">
                    {{ Illuminate\Support\Str::limit($expense->note, 20) }}
                    {{-- {{ str_limit($expense->note) }} --}}
                </td>
                <td class="px-4 py-3 ">
                    <a href="{{ route('expense.edit', $expense) }}">
                        <x-secondary-button>
                            Edit
                        </x-secondary-button>
                    </a>
                    <x-danger-button :form="'delete-' . $expense->id">
                        Delete
                    </x-danger-button>
                </td>
            </tr>
        @empty
            <tr>
                <td class="px-4 py-3" colspan="4">No expenses found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
