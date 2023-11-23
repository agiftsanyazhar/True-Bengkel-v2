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
                'about' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio ducimus quisquam aperiam eveniet possimus voluptatum fugit delectus omnis autem unde?

1. Ullamco laboris nisi ut aliquip ex ea commodo consequat.
2. Duis aute irure dolor in reprehenderit in voluptate velit.
3. Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.

Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, illo dignissimos magnam doloribus veniam quia quos illum fuga saepe quibusdam fugiat! Consectetur, temporibus nihil recusandae officia dicta, quis optio odio praesentium earum eum maxime totam quam. Quidem tempore incidunt quasi ut ipsum porro aspernatur ab fuga saepe, accusamus molestias distinctio.
                ',
                'location' => 'Institut Teknologi Sepuluh Nopember, Kampus Jl. Raya ITS, Keputih, Kec. Sukolilo, Surabaya, Jawa Timur 60111, Indonesia',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16673.13208541504!2d112.7937557!3d-7.275847100000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa10ea2ae883%3A0xbe22c55d60ef09c7!2sPoliteknik%20Elektronika%20Negeri%20Surabaya!5e1!3m2!1sid!2sus!4v1696674447535!5m2!1sid!2sus" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'email' => 'contact@true-bengkel.com',
                'phone' => '+628' . rand(111111111, 999999999),
                'opening_hours' => 'Mon-Sat: 8AM-4PM',
                'closing_hours' => 'Sunday: Closed',
                'hero_image' => 'uploads/spare-part/pexels-mike-bird-190574.jpg',
                'about_image' => 'uploads/spare-part/pexels-pixabay-73833.jpg',
            ],
        ];

        foreach ($admin as $item) {
            About::create($item);
        }
    }
}
