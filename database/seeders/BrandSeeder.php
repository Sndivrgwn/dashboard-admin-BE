<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $brands = [
            'Acme',
            'Nova',
            'Apex',
            'Summit',
            'Vertex',
            'Pulse',
            'Orbit',
            'Nimbus',
            'Cobalt',
            'Everest',
        ];

        foreach ($brands as $name) {
            Brand::create(['name' => $name]);
        }
    }
}
