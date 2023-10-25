<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            New Category
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Create new category for new items
        </p>
    </header>

    <form method="post" action="{{ route('category.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" value="Name" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name')"
                required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div> --}}

        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </form>
</section>
