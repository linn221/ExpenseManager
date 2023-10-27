<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            New Income
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Add your income
        </p>
    </header>

    <form method="post" action="{{ route('income.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" value="Amount" />
            <x-text-input id="amount" name="amount" type="number" step="50" class="mt-1 block w-full"
                :value="old('amount', 50)"
                required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('amount')" />
        </div>

        <div>
            <x-input-label for="label" value="Label" />
            <x-text-input id="label" name="label" type="text" class="mt-1 block w-full"
                :value="old('label', 'idk')"
                />
            <x-input-error class="mt-2" :messages="$errors->get('label')" />
        </div>

        <div>
            <x-input-label for="date" value="Date" />
            <x-text-input id="date" name="date" type="date" class="mt-1 block w-full"
                :value="old('date', date('Y-m-d'))"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>

        <div>
            <x-input-label for="note" value="Note" />
            <textarea name="note" id="note" class=" mt-1 block w-full">{{ old('note') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('note')" />
        </div>

        <x-primary-button>
            Store
        </x-primary-button>
    </form>
</section>
