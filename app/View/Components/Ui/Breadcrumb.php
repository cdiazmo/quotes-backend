<?php

namespace App\View\Components\Ui;

use App\Services\BreadcrumbService;
use Illuminate\Contracts\View\View;
use Route;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public string $key = "";
    public array $items;

    public function __construct()
    {
        $currentRouteName = Route::currentRouteName();
        $this->items = (new BreadcrumbService())->get($currentRouteName);
    }

    public function render(): View
    {
        return view('components.ui.breadcrumb');
    }
}
