<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\QuotesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuoteStoreRequest;
use App\Jobs\UploadJsonQuotesJob;
use App\Models\Author;
use App\Models\Category;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class QuoteController extends Controller
{
    public function index(QuotesDataTable $dataTable)
    {
        return $dataTable->render('admin.quotes.index');
    }

    public function create()
    {
        $categories = Category::quote()->pluck('name', 'id')->toArray();
        $authors = Author::pluck('name', 'id')->toArray();

        return view('admin.quotes.create', compact('categories', 'authors'));
    }

    public function store(QuoteStoreRequest $request)
    {
        $data = $request->validated();

        $quote = Quote::create(Arr::except($data, 'categories'));
        $quote->categories()->sync($data['categories']);

        return to_route('quotes.index');
    }

    public function show(Quote $quote)
    {
    }

    public function edit(Quote $quote)
    {
        $categoryIds = $quote->categories()->get()->pluck('pivot.category_id')->toArray();
        $categories = Category::quote()->pluck('name', 'id')->toArray();

        $authors = Author::pluck('name', 'id')->toArray();

        toastr()->success('Quote created successfully.');

        return view('admin.quotes.edit', compact('categories', 'categoryIds', 'quote', 'authors'));
    }

    public function update(QuoteStoreRequest $request, Quote $quote)
    {
        $data = $request->validated();

        $quote->update(Arr::except($data, 'categories'));
        $quote->categories()->sync($data['categories']);

        toastr()->success('Quote updated successfully.');

        return to_route('quotes.index');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();

        toastr()->success('Quote deleted successfully.');

        return redirect(route('quotes.index'));
    }

    public function uploadJsonQuotes(Request $request)
    {
        $quotes = json_decode(file_get_contents($request->json_file), true);
        UploadJsonQuotesJob::dispatch($quotes);

        toastr()->success('Quotes created successfully.');

        return to_route('quotes.index');
    }
}
