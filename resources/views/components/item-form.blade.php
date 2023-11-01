@props([
    'header',
    'description',
    'action',
    'edit' => false,
    'name',
    'price',
    'category_id'
])
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ $header }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>
    </header>

    <form method="post" action="{{ $action }}" class="mt-6 space-y-6">
        @csrf
        @if ($edit)
            @method('put')
        @endif

        <div>
            <x-input-label for="name" value="Name" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name', $name)"
                required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="price" value="Price" />
            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full"
                :value="old('price', $price)"
                step="50"
                required/>
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>

        <div>
            <x-input-label for="category" value="Category" />
            <select name="category_id" id="category" class=" mt-1 block w-full">
                @foreach (auth()->user()->categories as $category)
                    <option value="{{ $category->id }}" @selected($category->id == $category_id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
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
