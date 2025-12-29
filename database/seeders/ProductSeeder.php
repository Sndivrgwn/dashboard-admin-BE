<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $brand = Brand::first();
        $category = Category::first();

        if (!$brand || !$category) {
            return;
        }

        $products = [
            [
                'image' => 'product/sample-1.jpg',
                'name' => 'Trail Runner Shoe',
                'color' => '#1B1F3B',
                'weight_kg' => 1.25,
                'length_cm' => 30.50,
                'width_cm' => 12.00,
                'description' => 'Lightweight trail shoe with extra grip.',
                'stock_quantity' => 50,
                'availability_status' => 'in_stock',
                'visibility' => 'public',
                'channel' => 'online',
                'status' => 'published',
                'scheduled_at' => null,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
            ],
            [
                'image' => 'product/sample-2.jpg',
                'name' => 'City Backpack',
                'color' => '#2C3539',
                'weight_kg' => 0.80,
                'length_cm' => 45.00,
                'width_cm' => 30.00,
                'description' => 'Daily backpack with padded laptop sleeve.',
                'stock_quantity' => 120,
                'availability_status' => 'in_stock',
                'visibility' => 'public',
                'channel' => 'online',
                'status' => 'published',
                'scheduled_at' => null,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
            ],
        ];

    }
}
