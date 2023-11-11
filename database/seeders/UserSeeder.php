<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 1,
            ],
            [
                'name' => 'Pegawai 1',
                'email' => 'pegawai1@gmail.com',
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
            ],
            [
                'name' => 'Pegawai 2',
                'email' => 'pegawai2@gmail.com',
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
            ],
            [
                'name' => 'Pegawai 3',
                'email' => 'pegawai3@gmail.com',
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
            ],
            [
                'name' => 'Pelanggan 1',
                'email' => 'pelanggan1@gmail.com',
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 3,
            ],
            [
                'name' => 'Pelanggan 2',
                'email' => 'pelanggan2@gmail.com',
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 3,
            ],
            [
                'name' => 'Pelanggan 3',
                'email' => 'pelanggan4@gmail.com',
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 3,
            ],
        ];

        foreach ($user as $item) {
            User::create($item);
        }
    }
}
