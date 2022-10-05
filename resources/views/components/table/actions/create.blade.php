@props([
    'can' => true
])

@if($can)
    <div>
        <x-button {{ $attributes->merge(['class' => 'btn-primary btn-add pr-4 ml-2']) }}>
            <img src="{{asset('img/icons/add-plus.svg')}}" alt="add" class="add-image"> Add
        </x-button>
    </div>
@endif