<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Edit Expense
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Record expenses with items & quantity
        </p>
    </header>

    <form method="post" action="{{ route('expense.update', $expense) }}" class="mt-6 space-y-6"
    x-data='{
        item_id: {{ old('item_id', $expense->item_id) }},
        prices: @json(auth()->user()->items->pluck('price', 'id')),
        cost: {{ $expense->cost }},
        quantity: {{ old('quantity', $expense->quantity) }}
    }'>
        @csrf
        @method('put')

        <div>
            <x-input-label for="item" value="Item" />
            {{-- using select for now, supposed to be a drop down suggestion --}}
            <select name="item_id" id="item" class=" mt-1 block w-full"
            x-model="item_id"
            x-effect="cost = prices[item_id] * quantity"
            >
                @foreach (auth()->user()->items as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->name . ':' .$item->price }}
                    </option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('item_id')" />
        </div>

        <div>
            <x-input-label for="quantity" value="Quantity" />
            <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full"
                {{-- :value="old('quantity', $expense->quantity)" --}}
                x-model="quantity"
                x-effect="cost = prices[item_id] * quantity"
                required
            />
            <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
        </div>

        <div>
            <x-input-label for="cost" value="Cost" />
            <x-text-input name="cost"
            x-model="cost"
            x-effect="quantity = Math.trunc(cost / prices[item_id])"
            />
        </div>

        {{-- <div>
            <x-input-label for="cost" value="Cost" />
            <x-text-input id="cost" name="cost" type="number" class="mt-1 block w-full"
                :value="old('cost')"
                required/>
            <x-input-error class="mt-2" :messages="$errors->get('cost')" />
        </div> --}}

        <div>
            <x-input-label for="date" value="Date" />
            <x-text-input id="date" name="date" type="date" class="mt-1 block w-full"
                :value="old('date', $expense->date)"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>

        <div>
            <x-input-label for="note" value="Note" />
            <textarea name="note" id="note" class=" mt-1 block w-full">{{ old('note', $expense->note) }}</textarea>
        </div>

        <x-primary-button>
            Update
        </x-primary-button>
    </form>
</section>
