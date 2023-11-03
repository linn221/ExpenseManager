<section class=" space-y-2">
    <div>
        <x-input-label for="item_name" value="name" />
        <x-text-input id="item_name" name="item_name" type="text" class="mt-1 block w-full" x-model="item_name"
            required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('item_name')" />
    </div>

    <div>
        <x-input-label for="item_price" value="price" />
        <x-text-input id="item_price" name="item_price" type="number" class="mt-1 block w-full" x-model="item_price"
            step="50" required />
        <x-input-error class="mt-2" :messages="$errors->get('item_price')" />
    </div>

    <div>
        <x-input-label for="category" value="Category" />
        <select name="category_id" id="category" class=" mt-1 block w-full" x-model="category_id">
            @foreach (auth()->user()->categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class=" mt-2" x-show="show_checkbox">
        <label for="overwrite-checkbox" class="mr-2 font-medium text-gray-700">
            <input id="overwrite-checkbox" type="checkbox" name="overwrite">
            Overwrite/update
        </label>
    </div>

</section>
