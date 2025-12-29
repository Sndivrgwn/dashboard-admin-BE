<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return;
        }

        foreach ($products as $product) {
            $variants = [
                [
                    'product_id' => $product->id,
                    'sku' => $product->SKU . '-RED-S',
                    'option1_name' => 'color',
                    'option1_value' => 'red',
                    'option2_name' => 'size',
                    'option2_value' => 'S',
                    'price' => $product->price,
                    'compare_at_price' => $product->price + 15,
                    'is_active' => true,
                ],
                [
                    'product_id' => $product->id,
                    'sku' => $product->SKU . '-BLU-M',
                    'option1_name' => 'color',
                    'option1_value' => 'blue',
                    'option2_name' => 'size',
                    'option2_value' => 'M',
                    'price' => $product->price + 10,
                    'compare_at_price' => $product->price + 25,
                    'is_active' => true,
                ],
            ];

            foreach ($variants as $variant) {
                Variant::updateOrCreate(
                    ['sku' => $variant['sku']],
                    $variant
                );
            }
        }
    }
}
