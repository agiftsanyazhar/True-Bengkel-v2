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
                'headline' => 'Enhance Your Vehicles Performance with True Bengkel: Quality Service, Affordable Prices!',
                'description' => '<p>Welcome to True Bengkel, your trusted partner in optimizing your vehicles performance. At True Bengkel, we believe in delivering top-notch automotive services that go beyond expectations.</p><ul><li><i class="bi bi-check2-all"></i><strong>Expert Technicians:</strong> Our team consists of skilled technicians with a passion for automotive excellence.</li><li><i class="bi bi-check2-all"></i><Strong>Affordable Pricing:</Strong> Quality service doesnt have to come with a hefty price tag. True Bengkel offers competitive and transparent pricing.</li><li><i class="bi bi-check2-all"></i><Strong>Customer-Centric Approach:</Strong> Your satisfaction is our priority. We focus on providing excellent customer service and clear communication.</li></ul><p>Choose True Bengkel for a seamless automotive experience where expertise meets affordability. Your vehicle deserves the best, and thats exactly what we deliver.</p>',
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
