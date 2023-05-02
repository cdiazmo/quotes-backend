<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    public function run()
    {
        $quote = Quote::create([
            'quote' => "I'm selfish, impatient and a little insecure. I make mistakes, I am out of control and at times hard to handle. But if you can't handle me at my worst, then you sure as hell don't deserve me at my best",
            'author_id' => 1
        ]);
        $quote->categories()->attach([1, 2]);
    }
}
