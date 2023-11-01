<x-app-layout>

    <div class="py-12 mx-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <x-item-form
                    header="Edit Item"
                    description="Edit item for future expenses"
                    :edit=true
                    :action="route('item.update', $item->id)"
                    :name="old('name', $item->name)"
                    :price="old('price', $item->price)"
                    :category_id="old('category_id', $item->category_id)"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
