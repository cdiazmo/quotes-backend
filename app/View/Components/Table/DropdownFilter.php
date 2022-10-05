<?php

namespace App\View\Components\Table;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownFilter extends Component
{
    public array $tableFilters;

    /**
     * @param array $tableFilters
     */
    public function __construct(array $tableFilters)
    {
        $this->tableFilters = $tableFilters;
    }


    public function render(): View
    {
        return view('components.table.dropdown-filter');
    }
}
