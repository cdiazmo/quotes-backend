<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        $quotes = Quote::query()
            ->when($request->query('searchTerm'), function ($query) use ($request) {
                $query->whereHas('categories', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->query('searchTerm') . '%');
                });
            })
            ->when($request->query('author'), function ($query) use ($request) {
                $query->whereHas('author', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->query('author') . '%');
                });
            })
            ->when($request->query('author_id'), function ($query) use ($request) {
                $query->whereAuthorId($request->query('author_id'));
            })
            ->inRandomOrder()
            ->with(['categories:name', 'author:id,name'])
            ->paginate(100);

        return QuoteResource::collection($quotes);
    }

    public function store(Request $request)
    {
    }

    public function show(Quote $quote)
    {
    }

    public function update(Request $request, Quote $quote)
    {
    }

    public function destroy(Quote $quote)
    {
    }
}
