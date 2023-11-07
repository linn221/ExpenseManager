@if (!request()->has('trashed'))
    <a href="{{ route('item.index') . '?trashed' }}">
        <x-primary-button class=" bg-yellow-400">
            With Trash
            {{-- @update, count of trash --}}
        </x-primary-button>
    </a>
@else
    <a href="{{ route('item.index') }}">
        <x-primary-button class=" bg-yellow-400">
            Index
            {{-- @update, count of trash --}}
        </x-primary-button>
    </a>
@endif

@if (!request()->has('only-trashed'))
    <a href="{{ route('item.index') . '?only-trashed' }}">
        <x-danger-button>
            Trash Bin
            {{-- @update, count of trash --}}
        </x-danger-button>
    </a>
@else
    <form action="{{ route('item.recycleBin') }}" method="post" id="recycleBin">
        @csrf
    </form>
    <form action="{{ route('item.emptyBin') }}" method="post" id="emptyBin">
        @csrf
    </form>
    <x-primary-button form="recycleBin">
        recycle bin
    </x-primary-button>

    <x-danger-button form="emptyBin">
        empty bin
    </x-danger-button>
@endif
