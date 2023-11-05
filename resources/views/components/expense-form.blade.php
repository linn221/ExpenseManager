@props(['header', 'description', 'action', 'edit' => false, 'item_id', 'quantity', 'date', 'note'])
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ $header }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>
    </header>

    <form method="post" action="{{ $action }}" class="mt-6 space-y-6"
        x-data='{
        item_id: {{ $item_id }},
        quantity: {{ $quantity }},
        item_name: "",
        item_price: 50,
        category_id: 1,
        cost: 0,
        show_checkbox: false,
        overwrite: false,
        item_prices: @json(auth()->user()->items->pluck('price', 'id')),
        item_names: @json(auth()->user()->items->pluck('name', 'id')),
        item_categories: @json(auth()->user()->items->pluck('category_id', 'id')),
    }'>

        @csrf
        @if ($edit)
            @method('put')
        @endif

        <div>
            <x-input-label for="item" value="Item" />
            {{-- using select for now, supposed to be a drop down suggestion --}}
            <select name="item_id" id="item" class=" mt-1 block w-full" x-model="item_id"
                x-on:click="
                    item_name = item_names[item_id];
                    item_price = item_prices[item_id];
                    category_id = item_categories[item_id];
                    overwrite = false;
                    {{-- don't show overwrite checkbox for new item --}}
                    show_checkbox = item_id != 0;
            ">
                <option value="0">
                    New Item
                </option>
                @foreach (auth()->user()->items as $item)
                    <option value="{{ $item->id }}")>
                        {{ $item->name . ':' . $item->price }}
                    </option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('item_id')" />

            <div class=" ms-10 my-4 me-4">
                @include('items.partials.item-form-partial')
            </div>
        </div>

        <div class="">
            <x-input-label for="quantity" value="Quantity" />
            <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full" x-model="quantity"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
        </div>

        <div class="">
            <x-input-label for="date" value="Date" />
            <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" :value="$date"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>

        <div class=" text-lg font-weight-bold">
            Cost: <span class=" text-green-600" x-text=" quantity * item_price"></span>
        </div>
        {{-- 
        <div>
            <x-input-label for="cost" value="Cost" />
            <x-text-input id="cost" name="cost" x-model="cost"
                x-effect="quantity = Math.trunc(cost / prices[item_id])" required />
            <x-input-error class="mt-2" :messages="$errors->get('cost')" />
        </div> --}}
        <div>
            <x-input-label for="note" value="Note" />
            <textarea name="note" id="note" class=" mt-1 block w-full">{{ $note }}</textarea>
        </div>

        <x-primary-button>
            @if ($edit)
                Update
            @else
                Store
            @endif
        </x-primary-button>
    </form>
</section>
