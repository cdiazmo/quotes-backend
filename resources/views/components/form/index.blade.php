@props([
    'method'=>'POST',
    'action'=>'#',
    'hasFiles'=>'false',
])

@php
    $method=strtoupper($method);
@endphp

<form method="{{ $method !== 'GET' ? 'POST' : 'GET' }}"
        action="{{ $action }}"
        {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!}
        {{ $attributes }}>
    @csrf
    @method($method)

    {{ $slot }}
</form>
