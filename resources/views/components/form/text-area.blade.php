<div>
    <textarea
        rows="3"
        {{ $attributes->merge(['class' => 'form-control']) }}
        name="{{ $name }}"
        id="{{ $id }}">@if($value){!! $value !!}@endif</textarea>
</div>

