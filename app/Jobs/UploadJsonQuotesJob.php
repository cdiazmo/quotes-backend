<?php

namespace App\Jobs;

use App\Models\Author;
use App\Models\Category;
use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;

class UploadJsonQuotesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $quotes;

    public function __construct($quotes)
    {
        $this->quotes = $quotes;
    }

    public function handle()
    {

        foreach ($this->quotes as $quote) {

            $author = Author::updateOrCreate(['name' => $quote['author']],['name' => $quote['author']]);

            $newQuote = Quote::create([
                'quote' => $quote['quote'],
                'author_id' => $author->id
            ]);

            $categoriesIds = [];

            foreach ($quote['categories'] as $category) {
                $categoriesIds[] = Category::updateOrCreate(['name' => $category])->id;
            }

            $newQuote->categories()->sync($categoriesIds);
        }
    }
}
