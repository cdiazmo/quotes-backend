<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    public $heading;
    public bool $inline;
    public bool $stacked;
    public string $col;
    public bool $checkedBold;

    public function __construct(bool $inline = false, $heading = null, bool $stacked = false, $col = 'col-md-12', $checkedBold = false)
    {
        $this->inline = $inline;
        $this->stacked = $stacked;
        $this->heading = $heading;
        $this->col = $col;
        $this->checkedBold = $checkedBold;
    }

    public function render(): View
    {
        return view('components.form.radio-group');
    }
}
