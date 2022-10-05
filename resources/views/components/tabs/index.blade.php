@props([
    'tabs'
])

<div>
    <x-tabs.tab-header :tabs="$tabs"></x-tabs.tab-header>

    <div class="tab-content">
        {{$slot}}
    </div>
</div>