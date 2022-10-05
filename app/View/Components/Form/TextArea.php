<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    public $name;
    public $id;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $id = null, $value = '')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value);
    }

    public function render(): View
    {
        return view('components.form.text-area');
    }
}
