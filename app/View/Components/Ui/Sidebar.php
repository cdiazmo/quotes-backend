<?php

namespace App\View\Components\Ui;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public array $sideBarItems = [];

    public function __construct()
    {
        $this->sideBarItems = [
            [
                "link" => route('dashboard'),
                "icon" => "home",
                "title" => "Dashboard",
                "is_active" => request()->routeIs('dashboard')
            ],
            [
                "link" => route('authors.index'),
                "icon" => "authors",
                "title" => "Authors",
                "is_active" => request()->routeIs('authors.*')
            ],
            [
                "link" => route('quotes.index'),
                "icon" => "quotes",
                "title" => "Quotes",
                "is_active" => request()->routeIs('quotes.*')
            ],
            [
                "link" => route('categories.index'),
                "icon" => "categories",
                "title" => "Categories",
                "is_active" => request()->routeIs('categories.*')
            ],
            [
                "link" => route('home-categories.index'),
                "icon" => "categories",
                "title" => "Home Categories",
                "is_active" => request()->routeIs('home-categories.*')
            ],
            [
                "link" => route('templates.index'),
                "icon" => "templates",
                "title" => "Templates",
                "is_active" => request()->routeIs('templates.*')
            ],
            [
                "link" => route('stickers.index'),
                "icon" => "stickers",
                "title" => "Stickers",
                "is_active" => request()->routeIs('stickers.*')
            ],
            [
                "link" => route('titles.index'),
                "icon" => "titles",
                "title" => "Titles",
                "is_active" => request()->routeIs('titles.*')
            ],
            [
                "link" => route('splashes.index'),
                "icon" => "splashes",
                "title" => "Splashes",
                "is_active" => request()->routeIs('splashes.*')
            ],
        ];
    }

    public function render(): View
    {
        return view('components.ui.sidebar');
    }
}
