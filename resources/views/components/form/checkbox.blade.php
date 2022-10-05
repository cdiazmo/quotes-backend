@aware(['stacked' => false])

<div @class(['form-check','form-check-inline' => !$stacked])>
    <input
        name="{{ $name }}"
        type="checkbox"
        id="{{ $id }}"
        @if($value)value="{{ $value }}"@endif

        {{$isChecked()}}

        {{ $attributes->merge(['class'=>'form-check-input']) }}
    />

    @if($label)
        <label class="form-check-label" for="{{ $id }}">{{$label}}</label>
    @endif
</div>
