<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gallery = [
            [
                'name' => 'Image 1',
                'image' => 'uploads/gallery/pexels-pixabay-162553.jpg',
            ],
            [
                'name' => 'Image 2',
                'image' => 'uploads/gallery/pexels-lisa-fotios-115558.jpg',
            ],
            [
                'name' => 'Image 3',
                'image' => 'uploads/gallery/pexels-pavel-chernonogov-2381463.jpg',
            ],
            [
                'name' => 'Image 4',
                'image' => 'uploads/gallery/pexels-suntorn-somtong-1029243.jpg',
            ],
        ];

        foreach ($gallery as $item) {
            Gallery::create($item);
        }
    }
}
