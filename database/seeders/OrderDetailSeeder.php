<?php

namespace Database\Seeders;

use App\Models\{
    Order,
    OrderDetail,
    SparePart,
};
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderDetail = [
            [
                'order_id' => 1,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 1,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 1,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 2,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 2,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 2,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 2,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 3,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 3,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 3,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 3,
                'spare_part_id' => rand(1, 10),
                'qty' => rand(1, 5),
                'harga_satuan' => 0,
            ],
        ];

        foreach ($orderDetail as $item) {
            $sparePart = SparePart::find($item['spare_part_id']);

            $item['harga_satuan'] = $sparePart->price;

            $orderDetail = OrderDetail::create($item);

            $order = Order::find($item['order_id']);

            $totalShopping = $item['harga_satuan'] * $item['qty'];
            $order->total_shopping += $totalShopping;

            $order->save();
        }
    }
}
