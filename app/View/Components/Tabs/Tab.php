<?php

namespace App\View\Components\Tabs;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tab extends Component
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render(): View
    {
        return view('components.tabs.tab');
    }
}
