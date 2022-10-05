<?php

namespace App\View\Components\Table;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NoData extends Component
{
    public int $colspan;

    public function __construct($colspan=5)
    {
        $this->colspan=$colspan;
    }

    public function render(): View
    {
        return view('components.table.no-data');
    }
}
