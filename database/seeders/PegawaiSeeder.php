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
                'phone' => '+628' . rand(111111111, 999999999),
                'alamat' => 'Surabaya',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas sapiente qui magni commodi doloribus quisquam consequatur doloremque nemo quia consectetur, voluptatem, asperiores est impedit dolor fuga repellendus officiis exercitationem praesentium.',
                'user_id' => 2,
                'jabatan_id' => 1,
            ],
            [
                'name' => 'Pegawai 2',
                'email' => 'pegawai2@gmail.com',
                'phone' => '+628' . rand(111111111, 999999999),
                'alamat' => 'Gresik',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas sapiente qui magni commodi doloribus quisquam consequatur doloremque nemo quia consectetur, voluptatem, asperiores est impedit dolor fuga repellendus officiis exercitationem praesentium.',
                'user_id' => 3,
                'jabatan_id' => 2,
            ],
            [
                'name' => 'Pegawai 3',
                'email' => 'pegawai3@gmail.com',
                'phone' => '+628' . rand(111111111, 999999999),
                'alamat' => 'Sidoarjo',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas sapiente qui magni commodi doloribus quisquam consequatur doloremque nemo quia consectetur, voluptatem, asperiores est impedit dolor fuga repellendus officiis exercitationem praesentium.',
                'user_id' => 4,
                'jabatan_id' => 3,
            ],
        ];

        foreach ($pegawai as $item) {
            Pegawai::create($item);
        }
    }
}
