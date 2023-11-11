<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            [
                'name' => 'Kepala Bengkel',
                'gaji_pokok' => '10000000',
                'tunjangan' => '5000000',
            ],
            [
                'name' => 'Teknisi',
                'gaji_pokok' => '9000000',
                'tunjangan' => '4500000',
            ],
            [
                'name' => 'Administrasi',
                'gaji_pokok' => '8000000',
                'tunjangan' => '4000000',
            ],
            [
                'name' => 'Karyawan Umum',
                'gaji_pokok' => '7000000',
                'tunjangan' => '3500000',
            ],
            [
                'name' => 'Pemilik Usaha',
                'gaji_pokok' => '6000000',
            ],
        ];

        foreach ($jabatan as $item) {
            Jabatan::create($item);
        }
    }
}
