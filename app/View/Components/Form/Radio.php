<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Input
{
    public string $checked;
    public string $label;

    public function __construct(string $name, string $id = null, $checked = '1', ?string $value = '', $label = '')
    {
        parent::__construct($name, $id, 'radio', $value);

        $this->checked = old($name, $checked);
        $this->label = $label;
    }

    public function isChecked($value)
    {
        return $value == $this->checked ? 'checked=checked' : '';
    }


    public function render(): View
    {
        return view('components.form.radio');
    }
}
