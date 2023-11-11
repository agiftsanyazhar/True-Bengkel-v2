<?php

namespace Database\Seeders;

use App\Models\TipeMotor;
use Illuminate\Database\Seeder;

class TipeMotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipeMotor = [
            ['name' => 'Scooter',],
            ['name' => 'Sport Bike',],
            ['name' => 'Naked Bike',],
            ['name' => 'Sport Touring',],
            ['name' => 'Dirt Bike',],
            ['name' => 'Dual Bike',],
            ['name' => 'Cruiser',],
            ['name' => 'Motocross',],
            ['name' => 'Scrambler',],
            ['name' => 'ATV',],
        ];

        foreach ($tipeMotor as $item) {
            TipeMotor::create($item);
        }
    }
}
