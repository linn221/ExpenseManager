<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <x-item-form
                    header="New Item"
                    description="Create a new item for expenses"
                    :action="route('item.store')"
                    :name="old('name')"
                    :price="old('price', 50)"
                    :category_id="old('category_id', 1)"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
