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
                'pelanggan_id' => 1,
                'is_service' => 0,
                'payment_at' => Carbon::now(),
                'total_shopping' => 1500000,
                'bukti_pembayaran' => 'uploads/bukti-pembayaran/bukti-pembayaran-1.jpg',
            ],
            [
                'pelanggan_id' => 2,
                'is_service' => 1,
                'payment_at' => Carbon::now(),
                'total_shopping' => 350000,
                'bukti_pembayaran' => 'uploads/bukti-pembayaran/bukti-pembayaran-2.jpg',
            ],
            [
                'pelanggan_id' => 3,
                'is_service' => 0,
                'payment_at' => Carbon::now(),
                'total_shopping' => 250000,
                'bukti_pembayaran' => 'uploads/bukti-pembayaran/bukti-pembayaran-3.jpg',
            ],
        ];

        foreach ($order as $item) {
            Order::create($item);
        }
    }
}
