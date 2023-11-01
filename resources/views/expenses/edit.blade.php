<x-app-layout>

    <div class="py-12 mx-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <x-expense-form
                    header='Edit Expense'
                    description='Record expenses with items & quantity'
                    edit=true
                    :action="route('expense.update', $expense->id)"
                    :item_id="old('item_id', $expense->item_id)"
                    :quantity="old('quantity', $expense->quantity)"
                    :date="old('date', $expense->date)"
                    :note="old('note', $expense->note)"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
