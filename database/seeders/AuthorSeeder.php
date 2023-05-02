<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        Author::create([
            'name' => 'A. A. Milne'
        ]);

        Author::create([
            'name' => 'A. J. Liebling '
        ]);
    }
}
