<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Edit Item
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Edit for expenses
        </p>
    </header>

    <form method="post" action="{{ route('item.update', $item) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="name" value="Name" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name', $item->name)"
                required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="price" value="Price" />
            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full"
                :value="old('price', $item->price)"
                step="50"
                required/>
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>

        <div>
            <x-input-label for="category" value="Category" />
            <select name="category_id" id="category" class=" mt-1 block w-full">
                @foreach (auth()->user()->categories as $category)
                    <option value="{{ $category->id }}" @selected($category->id == old('category_id', $item->category_id))>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <x-primary-button>
            Update
        </x-primary-button>
    </form>
</section>
