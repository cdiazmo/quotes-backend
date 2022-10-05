<?php

namespace App\View\Components\Table;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BodyRow extends Component
{
    public int $reorderId;

    public function __construct($reorderId = null)
    {
        $this->reorderId = $reorderId;
    }

    public function render(): View
    {
        return view('components.table.body-row');
    }
}
