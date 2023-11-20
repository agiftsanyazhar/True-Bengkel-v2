<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kendaraan = [
            [
                'stnk' => $this->generateRandomString(4),
                'pelanggan_id' => rand(1, 3),
                'tipe_motor_id' => rand(1, 10),
                'no_mesin' => $this->generateRandomString(7),
                'brand_id' => '1',
                'no_rangka' => $this->generateRandomString(8),
                'tahun' => random_int(2000, 2023),
                'warna' => $this->generateWarna(),
            ],
            [
                'stnk' => $this->generateRandomString(4),
                'pelanggan_id' => rand(1, 3),
                'tipe_motor_id' => rand(1, 10),
                'no_mesin' => $this->generateRandomString(7),
                'brand_id' => '1',
                'no_rangka' => $this->generateRandomString(8),
                'tahun' => random_int(2000, 2023),
                'warna' => $this->generateWarna(),
            ],
            [
                'stnk' => $this->generateRandomString(4),
                'pelanggan_id' => rand(1, 3),
                'tipe_motor_id' => rand(1, 10),
                'no_mesin' => $this->generateRandomString(7),
                'brand_id' => '2',
                'no_rangka' => $this->generateRandomString(8),
                'tahun' => random_int(2000, 2023),
                'warna' => $this->generateWarna(),
            ],
            [
                'stnk' => $this->generateRandomString(4),
                'pelanggan_id' => rand(1, 3),
                'tipe_motor_id' => rand(1, 10),
                'no_mesin' => $this->generateRandomString(7),
                'brand_id' => '2',
                'no_rangka' => $this->generateRandomString(8),
                'tahun' => random_int(2000, 2023),
                'warna' => $this->generateWarna(),
            ],
            [
                'stnk' => $this->generateRandomString(4),
                'pelanggan_id' => rand(1, 3),
                'tipe_motor_id' => rand(1, 10),
                'no_mesin' => $this->generateRandomString(7),
                'brand_id' => '3',
                'no_rangka' => $this->generateRandomString(8),
                'tahun' => random_int(2000, 2023),
                'warna' => $this->generateWarna(),
            ],
            [
                'stnk' => $this->generateRandomString(4),
                'pelanggan_id' => rand(1, 3),
                'tipe_motor_id' => rand(1, 10),
                'no_mesin' => $this->generateRandomString(7),
                'brand_id' => '3',
                'no_rangka' => $this->generateRandomString(8),
                'tahun' => random_int(2000, 2023),
                'warna' => $this->generateWarna(),
            ],
        ];

        foreach ($kendaraan as $item) {
            Kendaraan::create($item);
        }
    }

    public function generateRandomString(int $lenght): string
    {
        $numbers = '0123456789';

        $randomString = '';

        $randomString .= strtoupper(Str::random(2));

        for ($i = 0; $i < $lenght; $i++) {
            $randomString .= $numbers[rand(0, strlen($numbers) - 1)];
        }

        $randomString .= strtoupper(Str::random(3));

        return $randomString;
    }

    public function generateWarna(): string
    {
        $dataWarna = ['Putih', 'Hitam', 'Merah', 'Biru', 'Silver'];

        $randomIndex = array_rand($dataWarna);

        $randomWarna = $dataWarna[$randomIndex];

        return $randomWarna;
    }
}
