@props(['status', 'raw_html' => null])
<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
    <p class="font-bold">{{ $status }}</p>
    @if ($raw_html)
        <p class="font-bold">
            {!! $raw_html !!}
        </p>
    @endif
</div>
