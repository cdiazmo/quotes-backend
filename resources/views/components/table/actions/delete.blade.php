@props([
    'href' => '#',
    'model' => null,
    'id' => null,
    'can' => true
])

@if($can)
    <x-button type="button"
              onclick="Livewire.emit('openModal', 'modals.delete-modal', {{ json_encode(['href' => $href,'model' => $model,'modelId' => $id]) }})"
              class="btn btn-danger-tbl">
        <i class="far fa-trash-alt"></i>
    </x-button>
@endif
