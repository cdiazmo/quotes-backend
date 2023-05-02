<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Quote;

class DashbaordController extends Controller
{
    public function __invoke()
    {
        $totalQuotes = Quote::count();

        $totalCategories = Category::quote()->count();

        $totalAuthors = Author::count();
        
        $totalHomeCategories = Category::homeCategory()->count();

        return view('dashboard', get_defined_vars());
    }
}
