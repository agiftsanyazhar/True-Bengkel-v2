<?php

namespace Database\Seeders;

use App\Models\Motor;
use Illuminate\Database\Seeder;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $motor = [
            [
                'name' => 'Honda 1',
                'brand_id' => '1',
                'tipe_motor_id' => '1',
            ],
            [
                'name' => 'Honda 2',
                'brand_id' => '1',
                'tipe_motor_id' => '2',
            ],
            [
                'name' => 'Yamaha 1',
                'brand_id' => '2',
                'tipe_motor_id' => '3',
            ],
            [
                'name' => 'Yamaha 2',
                'brand_id' => '2',
                'tipe_motor_id' => '4',
            ],
            [
                'name' => 'Suzuki 1',
                'brand_id' => '3',
                'tipe_motor_id' => '5',
            ],
            [
                'name' => 'Suzuki 2',
                'brand_id' => '3',
                'tipe_motor_id' => '6',
            ],
            [
                'name' => 'Kawasaki 1',
                'brand_id' => '4',
                'tipe_motor_id' => '7',
            ],
            [
                'name' => 'Kawasaki 2',
                'brand_id' => '4',
                'tipe_motor_id' => '8',
            ],
            [
                'name' => 'KTM 1',
                'brand_id' => '5',
                'tipe_motor_id' => '9',
            ],
            [
                'name' => 'KTM 2',
                'brand_id' => '5',
                'tipe_motor_id' => '10',
            ],
        ];

        foreach ($motor as $item) {
            Motor::create($item);
        }
    }
}
