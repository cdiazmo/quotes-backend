@php
    $hasSelect2 = str_contains( $attributes->get('class'),'select2');
@endphp
<div
    @if($hasSelect2)
        wire:ignore
        x-data="{data: ''}"
        x-init="
            select2 = $($refs.select2).select2();

            select2.on('select2:select', (event) => {
              data = Array.from(event.target.options).filter(option => option.selected).map(option => option.value);
            });

            select2.on('select2:unselect', (event) => {
              data = Array.from(event.target.options).filter(option => option.selected).map(option => option.value);
            });

            $watch('data', (value) => {
              var event = new Event('change',{value});
              $refs.select2.dispatchEvent(event)
            });
        "
    @endif>

    <select
        @if($hasSelect2) x-ref="select2" @endif

        {{ $attributes->merge(['class' => 'form-control']) }}
        name="{{ $name }}"
        id="{{ $id }}">

        @if($emptyOption && !$hasSelect2)
            <option value="" {{ $isSelected("") }}>{{$emptyOptionText}}</option>
        @endif

        @foreach($options as $key => $value)
            <option value="{{$key}}" {{ $isSelected($key) }}>{{ $value }}</option>
        @endforeach
    </select>
</div>

<x-form.error field="{{  $attributes->whereStartsWith('wire:model')->first() }}"></x-form.error>




