<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
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

        Address::updateOrCreate(
            ['user_id' => $user->id, 'label' => 'home'],
            [
                'user_id' => $user->id,
                'label' => 'home',
                'recipient_name' => $user->name,
                'phone' => $user->phone,
                'address_line' => 'Jl. Merdeka No. 1',
                'city' => 'Jakarta',
                'province' => 'DKI Jakarta',
                'postal_code' => '10110',
                'is_default' => true,
            ]
        );
    }
}
