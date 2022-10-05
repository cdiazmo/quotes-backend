<?php

namespace App\View\Components\Table\Actions;

use Illuminate\View\Component;

class View extends Component
{
    public $link;
    public function __construct($link="#")
    {
        $this->link=$link;
    }

    public function render()
    {
        return view('components.table.actions.view');
    }
}
