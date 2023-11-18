<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'name' => 'True Bengkel',
                'headline' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum esse fuga amet perspiciatis assumenda dignissimos, itaque adipisci accusamus saepe asperiores. Quae totam facere, id recusandae libero ipsam ratione rem at officiis, quibusdam tempore cum odit impedit dignissimos, quo sequi delectus possimus deleniti distinctio aperiam sint inventore! Quibusdam vel esse at.',
                'about' => '
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio ducimus quisquam aperiam eveniet possimus voluptatum fugit delectus omnis autem unde?

                1. Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                2. Duis aute irure dolor in reprehenderit in voluptate velit.
                3. Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.

                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, illo dignissimos magnam doloribus veniam quia quos illum fuga saepe quibusdam fugiat! Consectetur, temporibus nihil recusandae officia dicta, quis optio odio praesentium earum eum maxime totam quam. Quidem tempore incidunt quasi ut ipsum porro aspernatur ab fuga saepe, accusamus molestias distinctio.
                ',
                'location' => 'Institut Teknologi Sepuluh Nopember, Kampus Jl. Raya ITS, Keputih, Kec. Sukolilo, Surabaya, Jawa Timur 60111, Indonesia',
                'email' => 'contact@true-bengkel.com',
                'phone' => '+628123456789',
                'opening_hours' => 'Mon-Sat: 8AM-4PM',
                'closing_hours' => 'Sunday: Closed',
            ],
        ];

        foreach ($admin as $item) {
            About::create($item);
        }
    }
}
