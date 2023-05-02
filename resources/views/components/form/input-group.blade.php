<div class="{{$col}}">

    <x-form.form-group>
        @isset($label)
            <x-form.label name="{{ $name }}" label="{{$label}}" class="col-form-label"></x-form.label>
        @endisset

        <x-form.input name="{{ $name }}" {{$attributes->merge(['placeholder' => $label ])}}></x-form.input>
    </x-form.form-group>
</div>
