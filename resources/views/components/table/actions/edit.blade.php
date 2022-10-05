@props([
    'modalName' => '',
    'data' => [],
    'href' => '',
    'can' => true
])
@if($can)
    @if($modalName && !$href)

        <a onclick='Livewire.emit("openModal", "{{$modalName}}", {{ json_encode($data) }})'>
            <span class="btn btn-primary-tbl"><i class="fa fa-pencil-alt"></i></span>
        </a>
    @else
        <x-button href="{{$href}}" class="btn-primary-tbl">
            <span><i class="fa fa-pencil-alt"></i></span>
        </x-button>
    @endif
@endif
