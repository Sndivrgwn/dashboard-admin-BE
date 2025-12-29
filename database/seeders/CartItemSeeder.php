<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Variant;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $cart = Cart::first();
        $variant = Variant::first();

        if (!$cart || !$variant) {
            return;
        }

        CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'variant_id' => $variant->id],
            [
                'cart_id' => $cart->id,
                'variant_id' => $variant->id,
                'qty' => 2,
                'unit_price_snapshot' => $variant->price,
            ]
        );
    }
}
