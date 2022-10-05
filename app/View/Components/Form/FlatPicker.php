<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FlatPicker extends Component
{
    public $label;
    public $name;
    public $inline;
    public $col;
    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $inline = false, $label = null, $col = "col-md-12", $options = [])
    {
        $this->name = $name;
        $this->inline = $inline;
        $this->label = $label;
        $this->col = $col;
        $this->options = json_encode($options);
    }

    public function render(): View
    {
        return view('components.form.flat-picker');
    }
}
