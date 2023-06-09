<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public string $id;
    public array $options;
    public string $selected;
    public bool $emptyOption;
    public string $emptyOptionText;
    public array $selectedValue;

    public function __construct($name, $id = null, $options = [], $selected = '', $emptyOption = true, $emptyOptionText = "Choose option", $selectedValue = [])
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->options = $options;
        $this->selected = old($name, $selected);
        $this->emptyOption = $emptyOption;
        $this->emptyOptionText = $emptyOptionText;
        $this->selectedValue = $selectedValue;
    }

    public function isSelected($option)
    {
        if (count($this->selectedValue) > 0) {
            return in_array($option, $this->selectedValue) ? 'selected=selected' : '';
        }
        return $option == $this->selected ? 'selected=selected' : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
