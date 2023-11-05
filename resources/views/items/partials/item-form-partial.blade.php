<section class=" space-y-2">
    <div x-effect="
        {{-- hacked alpine.js to continue the expression --}}
        if ((item_name != item_names[item_id]) + (item_price != item_prices[item_id]) + (category_id != item_categories[item_id]) > 0) {
            {{-- if the item already exist --}}
            if (item_id != 0)
                overwrite = true;
        } else {
            overwrite = false;
        }
    ">

    </div>
    <div>
        <x-input-label for="item_name" value="name" />
        <x-text-input id="item_name" name="item_name" type="text" class="mt-1 block w-full"
        x-model="item_name" required />
        <x-input-error class="mt-2" :messages="$errors->get('item_name')" />
    </div>


    <div>
        <x-input-label for="item_price" value="price" />
        <x-text-input id="item_price" name="item_price" type="number" class="mt-1 block w-full"
        x-model="item_price" step="50" required />
        <x-input-error class="mt-2" :messages="$errors->get('item_price')" />
    </div>

    <div>
        <x-input-label for="category" value="Category" />
        <select name="category_id" id="category" class=" mt-1 block w-full"
        x-model="category_id"
        >
            @foreach (auth()->user()->categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class=" mt-2" x-show="show_checkbox">
        <label for="overwrite-checkbox" class="mr-2 font-medium text-gray-700">
            <input id="overwrite-checkbox" type="checkbox" name="overwrite" x-model="overwrite" />
            Overwrite/update
        </label>
    </div>

</section>
