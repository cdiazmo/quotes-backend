<div {{ $attributes->merge(['class' => 'mb-2 '.$col]) }}>
    <img src="{{$media->getUrl()}}" class="img-preview"/>

    <x-button
        type="button"
        class="btn-delete"
        data-toggle='modal' data-target='#deleteModal'
        url="{{ route('delete-file-media',['media'=> $media->id]) }}">
        <span class="fa fa-trash btn-delete-img text-danger"></span>
    </x-button>
</div>
