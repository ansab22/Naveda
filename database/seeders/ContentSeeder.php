<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    public function run()
    {
        Content::updateOrCreate(['key' => 'home.heroHome'], [
            'data' => [
                'title' => 'Leading the Charge in Advanced Nursing Care',
                'subtitle' => 'Expert care with compassion',
                'button_text' => 'Read More',
                'button_link' => '/about',
            ]
        ]);

        Content::updateOrCreate(['key' => 'home.aboutHome'], [
            'data' => [
                'heading' => 'Empowering Care for the Heart and Soul',
                'description' => 'Short about text goes here.'
            ]
        ]);

        Content::updateOrCreate(['key' => 'home.faqHome'], [
            'data' => [
                'items' => [
                    ['q' => 'How long has your company been established?', 'a' => 'We started in 1990...'],
                    ['q' => 'Do you provide in-home care?', 'a' => 'Yes, we do...']
                ]
            ]
        ]);
    }
}
