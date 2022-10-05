<div class="table-responsive">
    <table class="table">

        @isset($header)
            <thead>
                <tr>
                    {{$header}}
                </tr>
            </thead>
        @endisset

        @isset($body)
            <tbody @if($body->attributes->has('draggable'))wire:sortable="reorder" wire:sortable.options="{ animation: 100,handle: '.drag-handle' }"@endif>
                {{$body}}
            </tbody>
        @endisset
    </table>
</div>