<th {{$attributes}}

    @if($sortable)
        @php
            $direction=$this->direction($sortable);
        @endphp

        wire:click="sortBy('{{$sortable}}')"
    @endif
>
    {{$slot}}

    @if($sortable)
        <span class="ml-4">
            @if ($direction === 'desc')

                <i class="fas fa-long-arrow-alt-down text-dark"></i>

            @elseif ($direction === 'asc')
                <i class="fas fa-long-arrow-alt-up text-dark"></i>
            @else
                <i class="fas fa-long-arrow-alt-up text-grey"></i>
                <i class="fas fa-long-arrow-alt-down text-grey"></i>
            @endif
         </span>
    @endif

</th>
