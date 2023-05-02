<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QouteController extends Controller
{
    public function index()
    {
        return view('admin.quotes.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Quote $quote)
    {
    }

    public function edit(Quote $quote)
    {
    }

    public function update(Request $request, Quote $quote)
    {
    }

    public function destroy(Quote $quote)
    {
    }
}
