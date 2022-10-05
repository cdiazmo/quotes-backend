<div class="dropdown mx-2 table-filter">
    <a class="btn btn-primary text-center" data-toggle="dropdown" href="javascript:void(0);"
       aria-expanded="false">
        <img src="{{asset('img/icons/filter.svg')}}" alt="">
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
         onclick="event.stopPropagation()"
         style="left: inherit; right: 0px;">

        @foreach($tableFilters as $key => $tableFilter)

            @if($tableFilter['type'] == 'select')
                <x-form.select-group
                        wire:model.defer="filters.{{$key}}"
                        name="{{$key}}"
                        :options="$tableFilter['data']"
                        label="{{$tableFilter['title']}}"/>
            @endif

        @endforeach
        <div class="d-flex justify-items-center justify-content-between">
            <x-button href="#" class="filter-action" wire:click="resetFilters">Reset</x-button>
            <x-button href="#" class="filter-action" wire:click="render">Apply</x-button>
        </div>
    </div>
</div>