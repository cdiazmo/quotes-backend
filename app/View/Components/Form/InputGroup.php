<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public $label;
    public $name;
    public $inline;
    public $col;
    public $labelClass;
    public $inputClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $inline = false, $label = null, $col = "col-md-12", $labelClass = "col-md-3", $inputClass = "col-md-9")
    {
        $this->name = $name;
        $this->inline = $inline;
        $this->label = $label;
        $this->col = $col;
        $this->labelClass = $labelClass;
        $this->inputClass = $inputClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-group');
    }
}
