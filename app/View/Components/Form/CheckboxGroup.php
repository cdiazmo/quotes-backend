<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckboxGroup extends Component
{
    public $heading;
    public bool $inline;
    public bool $stacked;
    public string $col;

    public function __construct(bool $inline = false, $heading = null, bool $stacked = false, $col = 'col-md-12')
    {
        $this->inline = $inline;
        $this->stacked = $stacked;
        $this->heading = $heading;
        $this->col = $col;
    }

    public function render(): View
    {
        return view('components.form.checkbox-group');
    }
}
