<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'user_id' => 1,
            ],
        ];

        foreach ($admin as $item) {
            Admin::create($item);
        }
    }
}
