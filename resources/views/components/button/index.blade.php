@props([
    'type'=> 'submit',
    'href'=> ''
])


@if($href != "")

    <a href="{{$href}}"
         {{ $attributes->merge(['class' => 'btn']) }} >
        {{$slot}}
    </a>

@else
    <button type="{{$type}}"
            {{ $attributes->merge(['class' => 'btn']) }}>
        {{$slot}}
    </button>

@endif