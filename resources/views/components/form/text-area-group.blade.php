@if($inline)
    <x-form.form-group class="row">

        @isset($label)
            <x-form.label name="{{ $name }}" label="{{$label}}" class="col-md-3 col-form-label"></x-form.label>
        @endisset

        <div class="col-md-9">
            <x-form.text-area name="{{ $name }}" {{$attributes}}></x-form.text-area>
        </div>
    </x-form.form-group>

@else

    <div class="{{$col}}">

        <x-form.form-group>
            @isset($label)
                <x-form.label name="{{ $name }}" label="{{$label}}" class="col-form-label"></x-form.label>
            @endisset

            <x-form.text-area name="{{ $name }}" {{$attributes->merge(['placeholder' => $label ])}}></x-form.text-area>
        </x-form.form-group>
    </div>
@endif