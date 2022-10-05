@props([
    'header' => '',
    'body' => ''
])

<x-button type="button"
        onclick="Livewire.emit('openModal', 'modals.view-more-modal', {{ json_encode(['header' => $header,'body' => $body]) }})"
        class="text-cyan">
    View
</x-button>