<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelanggan = [
            [
                'name' => 'Pelanggaan 1',
                'email' => 'pelanggan1@gmail.com',
                'phone' => '08123435289',
                'alamat' => 'Surabaya',
                'user_id' => 5,
            ],
            [
                'name' => 'Pelanggaan 2',
                'email' => 'pelanggan2@gmail.com',
                'phone' => '089489689182',
                'alamat' => 'Gresik',
                'user_id' => 6,
            ],
            [
                'name' => 'Pelanggaan 3',
                'email' => 'pelanggan3@gmail.com',
                'phone' => '082348291842',
                'alamat' => 'Sidoarjo',
                'user_id' => 7,
            ],
        ];

        foreach ($pelanggan as $item) {
            Pelanggan::create($item);
        }
    }
}
