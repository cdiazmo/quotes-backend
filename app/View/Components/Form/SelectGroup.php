<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectGroup extends Component
{
    public $label;
    public string $name;
    public bool $inline;
    public string $col;
    public string $labelClass;
    public string $inputClass;
    public array $selectedValue;

    public function __construct($name, $inline = false, $label = null, $col = "col-md-12", $labelClass = "col-md-3", $inputClass = "col-md-9", $selectedValue = [])
    {
        $this->name = $name;
        $this->inline = $inline;
        $this->label = $label;
        $this->col = $col;
        $this->labelClass = $labelClass;
        $this->inputClass = $inputClass;
        $this->selectedValue = $selectedValue;
    }


    public function render(): View
    {
        return view('components.form.select-group');
    }
}
