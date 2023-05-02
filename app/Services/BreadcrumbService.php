<?php

namespace App\Services;

use Illuminate\Support\Facades\Route;

class BreadcrumbService
{
    public array $breadcrumbs;

    public function __construct()
    {
        $this->breadcrumbs = [

            /****************************** AUTHORS ***********************/
            "authors.create" => [
                "Authors" => route('authors.index'),
                "Create Author" => "#"
            ],
            "authors.index" => [
                "Authors" => "#",
            ],
            "authors.edit" => [
                "Authors" => route('authors.index'),
                "Edit Author" => "#"
            ],

            /****************************** QUOTES ***********************/
            "quotes.create" => [
                "Quotes" => route('quotes.index'),
                "Create Quote" => "#"
            ],
            "quotes.index" => [
                "Quotes" => "#",
            ],
            "quotes.edit" => [
                "Quotes" => route('quotes.index'),
                "Edit Quote" => "#"
            ],

            /****************************** CATEGORIES ***********************/
            "categories.create" => [
                "Categories" => route('categories.index'),
                "Create Category" => "#"
            ],
            "categories.index" => [
                "Categories" => "#",
            ],
            "categories.edit" => [
                "Categories" => route('categories.index'),
                "Edit Category" => "#"
            ],

            /****************************** TEMPLATES ***********************/
            "templates.index" => [
                "Templates" => "#",
            ],

            /****************************** STICKERS ***********************/
            "stickers.index" => [
                "Stickers" => "#",
            ],

            /****************************** TITLES ***********************/
            "titles.index" => [
                "Titles" => "#",
            ],

            /****************************** HOME CATEGORIES ***********************/
            "home-categories.index" => [
                "Home Categories" => "#",
            ],

            /****************************** SPLASHES ***********************/
            "splashes.index" => [
                "Splashes" => "#",
            ],
        ];
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->breadcrumbs)) {
            return $this->breadcrumbs[$key];
        }

        return [];
    }

}
