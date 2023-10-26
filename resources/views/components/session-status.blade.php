@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-lg px-3 py-2 text-green-600']) }}>
        {{ $status }}
    </div>
@endif
