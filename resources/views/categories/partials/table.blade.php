<table class=" w-50">
    <thead>
        <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
            <th class="px-4 py-3">Id</th>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Date</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y">
        @forelse($categories as $category)
            <tr class="text-gray-700">
                <td class="px-4 py-3 ">
                    {{ $category->id }}
                </td>
                <td class="px-4 py-3 ">
                    {{ $category->name }}
                </td>
                <td class="px-4 py-3 ">
                    {{ $category->updated_at->diffForHumans() }}
                </td>
            </tr>
        @empty
            <tr>
                <td class="px-4 py-3" colspan="4">No categories found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
