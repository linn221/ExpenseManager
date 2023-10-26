<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    Item:
                    <strong>
                        {{ $expense->item->name }}
                    </strong>
                    <br>
                    Quantity:
                    <strong>
                        {{ $expense->quantity }}
                    </strong>
                    <br>
                    Cost:
                    <strong>
                        {{ $expense->cost }}
                    </strong>
                    <br>
                    Date:
                    <strong>
                        {{ $expense->date }}
                    </strong>
                    <br>
                    Note:
                    <br>
                    <strong>
                        {{ $expense->note }}
                    </strong>
                    <br>
                    Created AT: <strong>{{ $expense->created_at->format('d/m/Y') }}</strong>
                    <br>
                    Updated AT: <strong>{{ $expense->updated_at->format('d/m/Y') }}</strong>
                    {{-- @include('expenses.partials.create-form') --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
