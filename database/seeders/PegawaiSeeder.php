<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pegawai = [
            [
                'name' => 'Pegawai 1',
                'email' => 'pegawai1@gmail.com',
                'phone' => '08123456789',
                'alamat' => 'Surabaya',
                'user_id' => 2,
            ],
            [
                'name' => 'Pegawai 2',
                'email' => 'pegawai2@gmail.com',
                'phone' => '089483729182',
                'alamat' => 'Gresik',
                'user_id' => 3,
            ],
            [
                'name' => 'Pegawai 3',
                'email' => 'pegawai3@gmail.com',
                'phone' => '083648291842',
                'alamat' => 'Sidoarjo',
                'user_id' => 4,
            ],
        ];

        foreach ($pegawai as $item) {
            Pegawai::create($item);
        }
    }
}
