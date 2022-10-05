<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Error extends Component
{
    public $field;

    public function __construct($field)
    {
        $this->field = $field;
    }

    public function render(): View
    {
        return view('components.form.error');
    }
}
