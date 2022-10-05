<div {{$attributes->merge(['class'=>'card'])}}>

    @isset($header)
        <div {{ $header->attributes->class(['card-header py-3'])}}>
            {{$header}}
        </div>
    @endisset

    @isset($body)

        <div {{ $body->attributes->class(['card-body'])}}>
            {{ $body }}
        </div>

    @endisset


    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>