<div class="{{$col}} @if(str_contains( $attributes->get('class'),'select2')) has-select2 @endif ">
    <x-form.form-group>
        @isset($label)
            <x-form.label name="{{ $name }}" label="{{$label}}" class="col-form-label"></x-form.label>
        @endisset

        <x-form.select name="{{ $name }}" :selectedValue="$selectedValue" {{$attributes}}></x-form.select>
    </x-form.form-group>
</div>
