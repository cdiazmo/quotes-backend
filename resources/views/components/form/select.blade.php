<div>
    <select
        {{ $attributes->merge(['class' => 'form-control']) }}
        name="{{ $name }}"
        id="{{ $id }}">

        @if($emptyOption)
            <option value="" {{ $isSelected("") }}>{{$emptyOptionText}}</option>
        @endif

        @foreach($options as $key => $value)
            <option value="{{$key}}" {{ $isSelected($key) }}>{{ $value }}</option>
        @endforeach
    </select>
</div>




