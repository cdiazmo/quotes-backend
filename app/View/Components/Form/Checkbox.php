<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Input
{
    public bool $checked;
    public string $label;

    public function __construct(string $name, string $id = null, bool $checked = false, ?string $value = '', $label = '')
    {
        parent::__construct($name, $id, 'checkbox', $value);

        $this->checked = (bool)old($name, $checked);
        $this->label = $label;
    }

    public function isChecked()
    {
        return $this->checked ? 'checked' : '';
    }

    public function render(): View
    {
        return view('components.form.checkbox');
    }
}
