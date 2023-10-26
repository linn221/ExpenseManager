<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Edit Income
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Edit your income
        </p>
    </header>

    <form method="post" action="{{ route('income.update', $income) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="name" value="Amount" />
            <x-text-input id="amount" name="amount" type="number" step="50" class="mt-1 block w-full"
                :value="old('amount', $income->amount)"
                required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="label" value="Label" />
            <x-text-input id="label" name="label" type="text" class="mt-1 block w-full"
                :value="old('label', $income->label)"
                />
            <x-input-error class="mt-2" :messages="$errors->get('label')" />
        </div>

        <div>
            <x-input-label for="date" value="Date" />
            <x-text-input id="date" name="date" type="date" class="mt-1 block w-full"
                :value="old('date', $income->date)"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>

        <div>
            <x-input-label for="note" value="Note" />
            <textarea name="note" id="note" class=" mt-1 block w-full">{{ old('note', $income->note) }}</textarea>
        </div>

        <x-primary-button>
            Update
        </x-primary-button>
    </form>
</section>
