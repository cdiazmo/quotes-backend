<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filepond extends Component
{
    public string $name;
    public string $files;
    public string $label;

    public function __construct(string $name, string $label = '', array $files = [])
    {
        $this->name = $name;
        $this->files = json_encode($files);
        $this->label = $label;
    }

    public function render(): View
    {
        return view('components.form.filepond');
    }
}
