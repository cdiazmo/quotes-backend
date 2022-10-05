<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component
{
    public string $name;
    public string $label;

    /**
     * @param $name
     * @param $label
     */
    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
    }

    public function render(): View
    {
        return view('components.form.label');
    }
}
