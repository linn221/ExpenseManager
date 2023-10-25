<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Edit Category
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Edit new category for new items
        </p>
    </header>

    <form method="post" action="{{ route('category.update', $category->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="name" value="Name" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name', $category->name)"
                required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <x-primary-button>
            Update
        </x-primary-button>
    </form>
</section>
