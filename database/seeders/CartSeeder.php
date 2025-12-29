<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            return;
        }

        Cart::updateOrCreate(
            ['user_id' => $user->id, 'status' => 'open'],
            ['user_id' => $user->id, 'status' => 'open']
        );
    }
}
