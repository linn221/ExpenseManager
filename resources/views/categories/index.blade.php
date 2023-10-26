<x-app-layout>
    {{-- <x-slot name="header">
        {{ __('Categories') }}
    </x-slot>

    <div class="flex mb-4">
        <a class="px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600"
            href="{{ route('category.create') }}">
            {{ __('Create') }}
        </a>
    </div> --}}

    <div class="py-12">

        <div class="p-4 bg-white rounded-lg shadow-xs">

            <div class=" mb-4">
            <a href="{{ route('category.create') }}">
                <x-primary-button>
                    Create
                </x-primary-button>
            </a>

            </div>
            <div class="w-full mb-8 overflow-hidden border rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    @include('categories.partials.table')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
