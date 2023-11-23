<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = [
            [
                'order_code' => 'ODR-' . Carbon::now()->format('dmYHis'),
                'pelanggan_id' => rand(1, 3),
                'is_service' => rand(0, 1),
                'total_shopping' => 0,
                'bukti_pembayaran' => 'uploads/bukti-pembayaran/bukti-pembayaran-1.jpg',
            ],
            [
                'order_code' => 'ODR-' . Carbon::now()->format('dmYHis'),
                'pelanggan_id' => rand(1, 3),
                'is_service' => rand(0, 1),
                'total_shopping' => 0,
                'bukti_pembayaran' => 'uploads/bukti-pembayaran/bukti-pembayaran-2.jpg',
            ],
            [
                'order_code' => 'ODR-' . Carbon::now()->format('dmYHis'),
                'pelanggan_id' => rand(1, 3),
                'is_service' => rand(0, 1),
                'total_shopping' => 0,
                'bukti_pembayaran' => 'uploads/bukti-pembayaran/bukti-pembayaran-3.jpg',
            ],
        ];

        foreach ($order as $item) {
            Order::create($item);
        }
    }
}
