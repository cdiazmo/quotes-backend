<div class="modal-content">

    <x-form {{$attributes}}>

        @isset($header)
            <div class="modal-header">
                <h5 class="modal-title">{{$header}}</h5>
                <x-modal.close-btn></x-modal.close-btn>
            </div>
        @endisset

        @isset($body)
            <div class="modal-body">
                {{$body}}
            </div>
        @endisset

        @isset($footer)

            <div class="modal-footer d-flex justify-content-between">

                <div class="col-3 p-0">
                    <button type="button" class="btn btn-outline-brown btn-block">Close
                    </button>
                </div>

                {{$footer}}
            </div>
        @endisset
    </x-form>
</div>
