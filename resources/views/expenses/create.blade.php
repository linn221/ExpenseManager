<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    <x-expense-form
                    header='New Expense'
                    description='Record expenses with items & quantity'
                    :action="route('expense.store')"
                    :item_id="old('item_id', 0)"
                    :quantity="old('quantity', 1)"
                    :date="old('date', date('Y-m-d'))"
                    :note="old('note', '')"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
