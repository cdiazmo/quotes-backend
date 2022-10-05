<?php

namespace App\View\Components\Tabs;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TabHeader extends Component
{
    public array $tabs;

    public function __construct($tabs)
    {
        $this->tabs = $tabs;
    }

    public function render(): View
    {
        return view('components.tabs.tab-header');
    }
}
