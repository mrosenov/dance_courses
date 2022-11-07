@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'alert alert-danger']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </div>
@endif
