<tr {{$attributes->merge(['class'=>'drag-handle'])}} @if($reorderId) wire:sortable.item="{{ $reorderId }}" wire:key="reorder-{{ $reorderId }}" @endif>
    {{$slot}}
</tr>
