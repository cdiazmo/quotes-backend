<?php

namespace App\View\Components\Table;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToggleBtn extends Component
{
    public $model;
    public string $field;
    public int $id;
    public bool $checked;

    public function __construct($model, $field = "status")
    {
        $this->model = str_replace("\\", '\\\\', get_class($model));
        $this->field = $field;
        $this->id = $model->id;
        $this->checked = (bool) $model->$field;
    }


    public function render(): View
    {
        return view('components.table.toggle-btn');
    }
}
