<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextAreaGroup extends Component
{
    public $label;
    public $name;
    public $inline;
    public $col;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $inline = false, $label = null, $col = "col-md-12")
    {
        $this->name = $name;
        $this->inline = $inline;
        $this->label = $label;
        $this->col = $col;
    }

    public function render(): View
    {
        return view('components.form.text-area-group');
    }
}
