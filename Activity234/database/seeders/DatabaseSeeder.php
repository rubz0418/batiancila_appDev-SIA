<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ],
        );

        $visits = [
            [
                'shop_name' => '7-Eleven Hinunangan',
                'description' => 'Convenience store',
                'location' => 'Poblacion',
                'purpose' => 'Checked available snacks, drinks, and basic grocery items for a quick convenience store visit.',
                'time_on_site' => '30 minutes',
                'visit_date' => '2026-05-01',
                'image' => 'images/shops/seven-eleven.png',
            ],
            [
                'shop_name' => 'Puregold Hinunangan',
                'description' => 'Supermarket and grocery',
                'location' => 'Poblacion',
                'purpose' => 'Recorded grocery aisle layout, reviewed household supplies, and observed customer shopping activity.',
                'time_on_site' => '1 hour',
                'visit_date' => '2026-05-02',
                'image' => 'images/shops/puregold.png',
            ],
            [
                'shop_name' => 'Mr. DIY Hinunangan',
                'description' => 'Hardware and home supplies',
                'location' => 'Poblacion',
                'purpose' => 'Looked for home repair tools, storage supplies, and small accessories available in the shop.',
                'time_on_site' => '45 minutes',
                'visit_date' => '2026-05-03',
                'image' => 'images/shops/mr-diy.png',
            ],
            [
                'shop_name' => 'JF Store',
                'description' => 'Local sari-sari store',
                'location' => 'Tahusan',
                'purpose' => 'Visited a neighborhood store to record daily essentials and common local customer purchases.',
                'time_on_site' => '15 minutes',
                'visit_date' => '2026-05-04',
                'image' => 'images/shops/jf-store.png',
            ],
            [
                'shop_name' => 'Fashion Madness',
                'description' => 'Clothing and fashion shop',
                'location' => 'Poblacion',
                'purpose' => 'Reviewed available clothing items, fashion accessories, and display arrangements in the store.',
                'time_on_site' => '30 minutes',
                'visit_date' => '2026-05-05',
                'image' => 'images/shops/fashion-madness.png',
            ],
        ];

        foreach ($visits as $visit) {
            Item::updateOrCreate(
                ['shop_name' => $visit['shop_name']],
                $visit,
            );
        }
    }
}
