<?php

namespace Database\Seeders;

use App\Models\SparePart;
use Illuminate\Database\Seeder;

class SparePartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sparePart = [
            [
                'spare_part_code' => '12191-K15-900',
                'brand_id' => '1',
                'tipe_motor_id' => '1',
                'name' => 'GASKET, CYLINDER',
                'headline' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit voluptates labore neque.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis iste soluta enim asperiores repellendus aliquam laudantium hic, necessitatibus ut nisi aspernatur quis et ullam atque sed quas possimus, maiores quaerat vitae cupiditate? Eaque impedit animi provident. Labore unde inventore voluptatem eaque exercitationem aut voluptatum vero soluta voluptate deserunt neque, commodi, maiores cupiditate vel doloribus sequi impedit distinctio debitis nam dolorem reiciendis saepe iure tempore. Animi quis excepturi eius quibusdam nostrum beatae molestias saepe in laudantium natus eveniet neque voluptatem repellat quae officiis, odio, iure libero. Praesentium ad, at sunt esse quae nemo, similique ipsam tempore fugiat velit itaque iste.',
                'image' => 'uploads/spare-part/GASKET,CYLINDER.jpg',
                'stock' => rand(1, 999),
                'price' => '8000',
                'slug' => 'honda-spare-part',
            ],
            [
                'spare_part_code' => '14430-KSP-910',
                'brand_id' => '1',
                'tipe_motor_id' => '2',
                'name' => 'ARM COMP VALVE ROCKER',
                'headline' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit voluptates labore neque.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis iste soluta enim asperiores repellendus aliquam laudantium hic, necessitatibus ut nisi aspernatur quis et ullam atque sed quas possimus, maiores quaerat vitae cupiditate? Eaque impedit animi provident. Labore unde inventore voluptatem eaque exercitationem aut voluptatum vero soluta voluptate deserunt neque, commodi, maiores cupiditate vel doloribus sequi impedit distinctio debitis nam dolorem reiciendis saepe iure tempore. Animi quis excepturi eius quibusdam nostrum beatae molestias saepe in laudantium natus eveniet neque voluptatem repellat quae officiis, odio, iure libero. Praesentium ad, at sunt esse quae nemo, similique ipsam tempore fugiat velit itaque iste.',
                'image' => 'uploads/spare-part/ARM COMP VALVE ROCKER.jpg',
                'stock' => rand(1, 999),
                'price' => '195000',
                'slug' => 'honda-spare-part',
            ],
            [
                'spare_part_code' => '17211-K15-900',
                'brand_id' => '2',
                'tipe_motor_id' => '3',
                'name' => 'ELEMENT COMP, AIR/C',
                'headline' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit voluptates labore neque.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis iste soluta enim asperiores repellendus aliquam laudantium hic, necessitatibus ut nisi aspernatur quis et ullam atque sed quas possimus, maiores quaerat vitae cupiditate? Eaque impedit animi provident. Labore unde inventore voluptatem eaque exercitationem aut voluptatum vero soluta voluptate deserunt neque, commodi, maiores cupiditate vel doloribus sequi impedit distinctio debitis nam dolorem reiciendis saepe iure tempore. Animi quis excepturi eius quibusdam nostrum beatae molestias saepe in laudantium natus eveniet neque voluptatem repellat quae officiis, odio, iure libero. Praesentium ad, at sunt esse quae nemo, similique ipsam tempore fugiat velit itaque iste.',
                'image' => 'uploads/spare-part/ELEMENT COMP,AIR C.jpg',
                'stock' => rand(1, 999),
                'price' => '48000',
                'slug' => 'yamaha-spare-part',
            ],
            [
                'spare_part_code' => '18318-K25-600ZA',
                'brand_id' => '2',
                'tipe_motor_id' => '4',
                'name' => 'PROTECTOR, MUFFLER *TBLACK*',
                'headline' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit voluptates labore neque.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis iste soluta enim asperiores repellendus aliquam laudantium hic, necessitatibus ut nisi aspernatur quis et ullam atque sed quas possimus, maiores quaerat vitae cupiditate? Eaque impedit animi provident. Labore unde inventore voluptatem eaque exercitationem aut voluptatum vero soluta voluptate deserunt neque, commodi, maiores cupiditate vel doloribus sequi impedit distinctio debitis nam dolorem reiciendis saepe iure tempore. Animi quis excepturi eius quibusdam nostrum beatae molestias saepe in laudantium natus eveniet neque voluptatem repellat quae officiis, odio, iure libero. Praesentium ad, at sunt esse quae nemo, similique ipsam tempore fugiat velit itaque iste.',
                'image' => 'uploads/spare-part/PROTECTOR, MUFFLER TBLACK.jpg',
                'stock' => rand(1, 999),
                'price' => '30000',
                'slug' => 'yamaha-spare-part',
            ],
            [
                'spare_part_code' => '18318-K25-900',
                'brand_id' => '3',
                'tipe_motor_id' => '5',
                'name' => 'PROTECTOR, MUFFLER',
                'headline' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit voluptates labore neque.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis iste soluta enim asperiores repellendus aliquam laudantium hic, necessitatibus ut nisi aspernatur quis et ullam atque sed quas possimus, maiores quaerat vitae cupiditate? Eaque impedit animi provident. Labore unde inventore voluptatem eaque exercitationem aut voluptatum vero soluta voluptate deserunt neque, commodi, maiores cupiditate vel doloribus sequi impedit distinctio debitis nam dolorem reiciendis saepe iure tempore. Animi quis excepturi eius quibusdam nostrum beatae molestias saepe in laudantium natus eveniet neque voluptatem repellat quae officiis, odio, iure libero. Praesentium ad, at sunt esse quae nemo, similique ipsam tempore fugiat velit itaque iste.',
                'image' => 'uploads/spare-part/PROTECTOR, MUFFLER.jpg',
                'stock' => rand(1, 999),
                'price' => '33000',
                'slug' => 'suzuki-spare-part',
            ],
            [
                'spare_part_code' => '18318-K59-A10',
                'brand_id' => '3',
                'tipe_motor_id' => '6',
                'name' => 'PROTECTOR, MUFFLER',
                'headline' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit voluptates labore neque.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis iste soluta enim asperiores repellendus aliquam laudantium hic, necessitatibus ut nisi aspernatur quis et ullam atque sed quas possimus, maiores quaerat vitae cupiditate? Eaque impedit animi provident. Labore unde inventore voluptatem eaque exercitationem aut voluptatum vero soluta voluptate deserunt neque, commodi, maiores cupiditate vel doloribus sequi impedit distinctio debitis nam dolorem reiciendis saepe iure tempore. Animi quis excepturi eius quibusdam nostrum beatae molestias saepe in laudantium natus eveniet neque voluptatem repellat quae officiis, odio, iure libero. Praesentium ad, at sunt esse quae nemo, similique ipsam tempore fugiat velit itaque iste.',
                'image' => 'uploads/spare-part/PROTECTOR, MUFFLER1.jpg',
                'stock' => rand(1, 999),
                'price' => '30000',
                'slug' => 'suzuki-spare-part',
            ],
            [
                'spare_part_code' => '2212A-K36-T00',
                'brand_id' => '4',
                'tipe_motor_id' => '7',
                'name' => 'ROLLER WEIGHT SET',
                'headline' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit voluptates labore neque.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis iste soluta enim asperiores repellendus aliquam laudantium hic, necessitatibus ut nisi aspernatur quis et ullam atque sed quas possimus, maiores quaerat vitae cupiditate? Eaque impedit animi provident. Labore unde inventore voluptatem eaque exercitationem aut voluptatum vero soluta voluptate deserunt neque, commodi, maiores cupiditate vel doloribus sequi impedit distinctio debitis nam dolorem reiciendis saepe iure tempore. Animi quis excepturi eius quibusdam nostrum beatae molestias saepe in laudantium natus eveniet neque voluptatem repellat quae officiis, odio, iure libero. Praesentium ad, at sunt esse quae nemo, similique ipsam tempore fugiat velit itaque iste.',
                'image' => 'uploads/spare-part/ROLLER WEIGHT SET.jpg',
                'stock' => rand(1, 999),
                'price' => '47000',
                'slug' => 'kawasaki-spare-part',
            ],
            [
                'spare_part_code' => '23100-K35-V01',
                'brand_id' => '4',
                'tipe_motor_id' => '8',
                'name' => 'BELT DRIVE',
                'headline' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit voluptates labore neque.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis iste soluta enim asperiores repellendus aliquam laudantium hic, necessitatibus ut nisi aspernatur quis et ullam atque sed quas possimus, maiores quaerat vitae cupiditate? Eaque impedit animi provident. Labore unde inventore voluptatem eaque exercitationem aut voluptatum vero soluta voluptate deserunt neque, commodi, maiores cupiditate vel doloribus sequi impedit distinctio debitis nam dolorem reiciendis saepe iure tempore. Animi quis excepturi eius quibusdam nostrum beatae molestias saepe in laudantium natus eveniet neque voluptatem repellat quae officiis, odio, iure libero. Praesentium ad, at sunt esse quae nemo, similique ipsam tempore fugiat velit itaque iste.',
                'image' => 'uploads/spare-part/BELT DRIVE.jpg',
                'stock' => rand(1, 999),
                'price' => '120000',
                'slug' => 'kawasaki-spare-part',
            ],
            [
                'spare_part_code' => '30410-KVB-N51',
                'brand_id' => '5',
                'tipe_motor_id' => '9',
                'name' => 'UNIT COMP, CDI',
                'headline' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit voluptates labore neque.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis iste soluta enim asperiores repellendus aliquam laudantium hic, necessitatibus ut nisi aspernatur quis et ullam atque sed quas possimus, maiores quaerat vitae cupiditate? Eaque impedit animi provident. Labore unde inventore voluptatem eaque exercitationem aut voluptatum vero soluta voluptate deserunt neque, commodi, maiores cupiditate vel doloribus sequi impedit distinctio debitis nam dolorem reiciendis saepe iure tempore. Animi quis excepturi eius quibusdam nostrum beatae molestias saepe in laudantium natus eveniet neque voluptatem repellat quae officiis, odio, iure libero. Praesentium ad, at sunt esse quae nemo, similique ipsam tempore fugiat velit itaque iste.',
                'image' => 'uploads/spare-part/UNIT COMP,CDI.jpg',
                'stock' => rand(1, 999),
                'price' => '575000',
                'slug' => 'ktm-spare-part',
            ],
            [
                'spare_part_code' => '30700-KWN-712',
                'brand_id' => '5',
                'tipe_motor_id' => '10',
                'name' => 'CAP ASSY NOISE SUP',
                'headline' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit voluptates labore neque.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis iste soluta enim asperiores repellendus aliquam laudantium hic, necessitatibus ut nisi aspernatur quis et ullam atque sed quas possimus, maiores quaerat vitae cupiditate? Eaque impedit animi provident. Labore unde inventore voluptatem eaque exercitationem aut voluptatum vero soluta voluptate deserunt neque, commodi, maiores cupiditate vel doloribus sequi impedit distinctio debitis nam dolorem reiciendis saepe iure tempore. Animi quis excepturi eius quibusdam nostrum beatae molestias saepe in laudantium natus eveniet neque voluptatem repellat quae officiis, odio, iure libero. Praesentium ad, at sunt esse quae nemo, similique ipsam tempore fugiat velit itaque iste.',
                'image' => 'uploads/spare-part/CAP ASSY NOISE SUP.jpg',
                'stock' => rand(1, 999),
                'price' => '30000',
                'slug' => 'ktm-spare-part',
            ],
        ];

        foreach ($sparePart as $item) {
            SparePart::create($item);
        }
    }
}
