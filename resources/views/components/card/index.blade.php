<div {{$attributes->merge(['class'=>'card c-card'])}}>

    @isset($header)
        <div {{ $header->attributes->class(['card-header py-3 m-0 row'])}}>
            {{$header}}
        </div>
    @endisset

    @isset($body)

        <div {{ $body->attributes->class(['card-body'])}}>
            {{ $body }}
        </div>

    @endisset


    @isset($footer)
        <div {{ $footer->attributes->class(['card-footer'])}}>
            {{ $footer }}
        </div>
    @endisset
</div>
