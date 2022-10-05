<?php

namespace App\View\Components\Button;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewMore extends Component
{
    public function render(): View
    {
        return view('components.button.view-more');
    }
}
