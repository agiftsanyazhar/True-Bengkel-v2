<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            RoleSeeder::class,
            JabatanSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            PegawaiSeeder::class,
            PelangganSeeder::class,
            TipeMotorSeeder::class,
            BrandSeeder::class,
            MotorSeeder::class,
            SparePartSeeder::class,
            KendaraanSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
            ServiceDetailSeeder::class,
            AboutSeeder::class,
            GallerySeeder::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
