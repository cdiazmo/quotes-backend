<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'You', 'Me', 'Think', 'Believe', 'Love', 'I', 'Like', 'Together', 'Time', 'Dreams', 'Heart', 'Never', 'Will', 'Friends',
            'Experience', 'Nature', 'Yourself', 'Life', 'Beautiful', 'Change', 'Alone', 'Young', 'Books', 'Death', 'Children', 'Living',
            'Belief', 'Business', 'Money', 'Music', 'God', 'Past', 'Need', 'Learning', 'Hope', 'Miracle', 'Art', 'War', 'Women', 'Future',
            'Character', 'Family', 'Peace', 'Culture', 'History', 'Trying', 'Fear', 'Happiness', 'Power', 'Award', 'Home', 'Singing',
            'Personality', 'Relationship', 'Tradition', 'Soul', 'Ego', 'Wedding', 'Satire', 'Farewell', 'Celebration', 'I Love You',
            'Me', 'Time', 'Awards'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }

    }
}
