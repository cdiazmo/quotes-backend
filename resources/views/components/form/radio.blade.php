@aware(['stacked' => false])

<div @class(['form-check','form-check-inline' => !$stacked])>

    <input
        name="{{ $name }}"
        type="radio"
        id="{{ $id }}"
        @if($value)value="{{ $value }}"@endif

        {{$isChecked($value)}}

        {{ $attributes->merge(['class'=>'form-check-input']) }}
    />

    <label class="form-check-label" for="{{ $id }}">{{$label}}</label>
</div>
