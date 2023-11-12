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
                'spare_part_id' => 1,
                'qty' => 1,
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 1,
                'spare_part_id' => 2,
                'qty' => 1,
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 1,
                'spare_part_id' => 3,
                'qty' => 1,
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 2,
                'spare_part_id' => 4,
                'qty' => 1,
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 2,
                'spare_part_id' => 8,
                'qty' => 1,
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 2,
                'spare_part_id' => 7,
                'qty' => 1,
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 2,
                'spare_part_id' => 7,
                'qty' => 1,
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 3,
                'spare_part_id' => 4,
                'qty' => 4,
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 3,
                'spare_part_id' => 8,
                'qty' => 9,
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 3,
                'spare_part_id' => 7,
                'qty' => 2,
                'harga_satuan' => 0,
            ],
            [
                'order_id' => 3,
                'spare_part_id' => 7,
                'qty' => 3,
                'harga_satuan' => 0,
            ],
        ];

        foreach ($orderDetail as $item) {
            $sparePart = SparePart::find($item['spare_part_id']);
            $item['harga_satuan'] = $sparePart->price;

            $orderDetail = OrderDetail::create($item);
        }
    }
}
