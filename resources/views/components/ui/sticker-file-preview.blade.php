<div {{ $attributes->merge(['class' => 'mb-2 '.$col]) }}>
    <img src="{{$media->getUrl()}}" class="sticker-img-preview"/>

    <x-button class="btn-delete"
              type="button"
              data-toggle='modal' data-target='#deleteModal'
              url="{{ route('delete-file-media',['media'=> $media->id]) }}">
        <span class="fa fa-trash btn-delete-img text-danger"></span>
    </x-button>
</div>
