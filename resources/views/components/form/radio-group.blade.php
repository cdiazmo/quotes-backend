@if($inline)

@else
    <div {{ $attributes->class([$col, 'radio-bold-box' => $checkedBold]) }}>
        @isset($heading)
            <legend class="col-form-label font-weight-bolder">{{$heading}}</legend>
        @endisset

        <x-form.form-group>
             {{$slot}}
        </x-form.form-group>
    </div>
@endif
