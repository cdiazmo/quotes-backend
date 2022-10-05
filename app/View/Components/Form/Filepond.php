<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filepond extends Component
{
    public string $name;

    /**
     * @param $name
     * @return void
     */
    public function __construct($name='')
    {
        $this->name = $name;
    }

    public function render(): View
    {
        return view('components.form.filepond');
    }
}
