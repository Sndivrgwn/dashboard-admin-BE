<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Home & Kitchen',
            'Fashion',
            'Beauty',
            'Sports',
            'Outdoors',
            'Toys',
            'Books',
            'Office',
            'Automotive',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
