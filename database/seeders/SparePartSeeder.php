<?php

namespace Database\Seeders;

use App\Models\SparePart;
use Illuminate\Database\Seeder;

class SparePartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sparePart = [
            [
                'spare_part_id' => '12191-K15-900',
                'brand_id' => '1',
                'tipe_motor_id' => '1',
                'name' => 'GASKET, CYLINDER',
                'image' => 'uploads/spare-part/GASKET,CYLINDER.jpg',
                'stock' => '107',
                'price' => '8000',
            ],
            [
                'spare_part_id' => '14430-KSP-910',
                'brand_id' => '1',
                'tipe_motor_id' => '2',
                'name' => 'ARM COMP VALVE ROCKER',
                'image' => 'uploads/spare-part/ARM COMP VALVE ROCKER.jpg',
                'stock' => '207',
                'price' => '195000',
            ],
            [
                'spare_part_id' => '17211-K15-900',
                'brand_id' => '1',
                'tipe_motor_id' => '3',
                'name' => 'ELEMENT COMP, AIR/C',
                'image' => 'uploads/spare-part/ELEMENT COMP,AIR C.jpg',
                'stock' => '30',
                'price' => '48000',
            ],
            [
                'spare_part_id' => '18318-K25-600ZA',
                'brand_id' => '1',
                'tipe_motor_id' => '4',
                'name' => 'PROTECTOR, MUFFLER *TBLACK*',
                'image' => 'uploads/spare-part/PROTECTOR, MUFFLER TBLACK.jpg',
                'stock' => '86',
                'price' => '30000',
            ],
            [
                'spare_part_id' => '18318-K25-900',
                'brand_id' => '1',
                'tipe_motor_id' => '5',
                'name' => 'PROTECTOR, MUFFLER',
                'image' => 'uploads/spare-part/PROTECTOR, MUFFLER.jpg',
                'stock' => '25',
                'price' => '33000',
            ],
            [
                'spare_part_id' => '18318-K59-A10',
                'brand_id' => '1',
                'tipe_motor_id' => '6',
                'name' => 'PROTECTOR, MUFFLER',
                'image' => 'uploads/spare-part/PROTECTOR, MUFFLER1.jpg',
                'stock' => '14',
                'price' => '30000',
            ],
            [
                'spare_part_id' => '2212A-K36-T00',
                'brand_id' => '1',
                'tipe_motor_id' => '7',
                'name' => 'ROLLER WEIGHT SET',
                'image' => 'uploads/spare-part/ROLLER WEIGHT SET.jpg',
                'stock' => '73',
                'price' => '47000',
            ],
            [
                'spare_part_id' => '23100-K35-V01',
                'brand_id' => '1',
                'tipe_motor_id' => '8',
                'name' => 'BELT DRIVE',
                'image' => 'uploads/spare-part/BELT DRIVE.jpg',
                'stock' => '91',
                'price' => '120000',
            ],
            [
                'spare_part_id' => '30410-KVB-N51',
                'brand_id' => '1',
                'tipe_motor_id' => '9',
                'name' => 'UNIT COMP, CDI',
                'image' => 'uploads/spare-part/UNIT COMP,CDI.jpg',
                'stock' => '14',
                'price' => '575000',
            ],
            [
                'spare_part_id' => '30700-KWN-712',
                'brand_id' => '1',
                'tipe_motor_id' => '10',
                'name' => 'CAP ASSY NOISE SUP',
                'image' => 'uploads/spare-part/CAP ASSY NOISE SUP.jpg',
                'stock' => '85',
                'price' => '30000',
            ],
        ];

        foreach ($sparePart as $item) {
            SparePart::create($item);
        }
    }
}
