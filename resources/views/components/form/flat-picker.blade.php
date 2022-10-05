@if($inline)
    <x-form.form-group class="row">
        {{$disableDates}}
        @isset($label)
            <x-form.label name="{{ $name }}" label="{{$label}}" class="col-md-3 col-form-label"></x-form.label>
        @endisset

        <div class="col-md-9">
            <div wire:ignore x-data="{}">
                <x-form.input name="{{ $name }}"
                              x-ref="flatPicker"
                              x-init="flatpickr($refs.flatPicker,{
                                    disable: ['2022-08-02'],
                                });"
                ></x-form.input>
            </div>
            <x-form.error field="{{  $attributes->whereStartsWith('wire:model')->first() }}"></x-form.error>
        </div>
    </x-form.form-group>

@else

    <div class="{{$col}}">

        <x-form.form-group>
            @isset($label)
                <x-form.label name="{{ $name }}" label="{{$label}}" class="col-form-label"></x-form.label>
            @endisset

            <div wire:ignore x-data="{}">
                <x-form.input name="{{ $name }}"
                              {{ $attributes }}
                              x-ref="flatPicker"
                              x-init="flatpickr($refs.flatPicker,{{ $options }});"
                ></x-form.input>
            </div>

            <x-form.error field="{{  $attributes->whereStartsWith('wire:model')->first() }}"></x-form.error>
        </x-form.form-group>
    </div>
@endif



