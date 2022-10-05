@if($inline)

@else
    <div class="{{$col}}">
        @isset($heading)
            <legend class="col-form-label font-weight-bolder">{{$heading}}</legend>
        @endisset

        <x-form.form-group>

            @if($slot != "")
                {{$slot}}
            @else
                <x-form.checkbox {{$attributes}}></x-form.checkbox>
            @endif
        </x-form.form-group>
    </div>
@endif
