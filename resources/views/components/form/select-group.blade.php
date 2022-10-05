@if($inline)
    <x-form.form-group class="row">
        @isset($label)
            <x-form.label name="{{ $name }}" label="{{$label}}" class="{{ $labelClass }} col-form-label"></x-form.label>
        @endisset

        <div class="{{ $inputClass }}">
            <x-form.select name="{{ $name }}" {{$attributes}}></x-form.select>
        </div>
    </x-form.form-group>

@else

    <div class="{{$col}}">
        <x-form.form-group>
            @isset($label)
                <x-form.label name="{{ $name }}" label="{{$label}}" class="col-form-label"></x-form.label>
            @endisset

            <x-form.select name="{{ $name }}" {{$attributes}}></x-form.select>
        </x-form.form-group>
    </div>
@endif
