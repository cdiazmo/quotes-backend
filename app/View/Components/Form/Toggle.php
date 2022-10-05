<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toggle extends Component
{
    public string $name;
    public bool $checked;

    /**
     * @param string $name
     * @param bool $checked
     */
    public function __construct(string $name, bool $checked=false)
    {
        $this->name = $name;
        $this->checked = $checked;
    }


    public function render(): View
    {
        return view('components.form.toggle');
    }
}
