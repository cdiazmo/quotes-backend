<input
    {{ $attributes->merge(['class' => 'form-control']) }}
    name="{{ $name }}"
    type="{{ $type }}"
    id="{{ $id }}"
    @if($value)  value="{{ $value }}" @endif
/>

<x-form.error field="{{  $attributes->whereStartsWith('wire:model')->first() }}"></x-form.error>