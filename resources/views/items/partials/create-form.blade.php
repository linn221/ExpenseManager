<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            New Item
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Create new item for expenses
        </p>
    </header>

    <form method="post" action="{{ route('item.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" value="Name" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name')"
                required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="price" value="Price" />
            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full"
                :value="old('price', 50)"
                step="50"
                required/>
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>

        <div>
            <x-input-label for="category" value="Category" />
            <select name="category_id" id="category" class=" mt-1 block w-full">
                @foreach (auth()->user()->categories as $category)
                    <option value="{{ $category->id }}" @selected($category->id == old('category_id'))>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <x-primary-button>
            Store
        </x-primary-button>
    </form>
</section>
