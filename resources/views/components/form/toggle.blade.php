<div class="d-flex align-items-center">
    <label class="switch">

        <input
            name="{{ $name }}"
            type="checkbox"
            @if($checked) checked="checked" @endif
            {{$attributes}}
        />

        <span class="slider round"></span>
    </label>
</div>