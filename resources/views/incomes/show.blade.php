<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    Amount: <strong>{{ $income->amount }}</strong>
                    <br>
                    Label: <strong>{{ $income->label }}</strong>
                    <br>
                    Date: <strong>{{ $income->date }}</strong>
                    <br>
                    Note:
                    <br>
                    <strong>{{ $income->note }}</strong>
                    <br>
                    Created AT: <strong>{{ $income->created_at->format('d/m/Y') }}</strong>
                    <br>
                    Updated AT: <strong>{{ $income->updated_at->format('d/m/Y') }}</strong>
                    {{-- @include('incomes.partials.create-form') --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
