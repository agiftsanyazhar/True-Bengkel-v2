<?php

namespace Database\Seeders;

use App\Models\ServiceDetail;
use Illuminate\Database\Seeder;

class ServiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceDetail = [
            [
                'order_id' => 2,
                'name' => 'ganti_oli',
                'harga_jasa' => rand(1000, 999999),
            ],
        ];

        foreach ($serviceDetail as $item) {
            ServiceDetail::create($item);
        }
    }
}
