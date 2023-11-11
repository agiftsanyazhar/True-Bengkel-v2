<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brand = [
            ['name' => 'Honda',],
            ['name' => 'Yamaha',],
            ['name' => 'Suzuki',],
            ['name' => 'Kawasaki',],
            ['name' => 'KTM',],
            ['name' => 'Harley-Davidson',],
            ['name' => 'BMW Motorrad',],
            ['name' => 'Ducati',],
            ['name' => 'Kymco',],
            ['name' => 'Royal Enfield',],
        ];

        foreach ($brand as $item) {
            Brand::create($item);
        }
    }
}
