<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ChargingStationsSeeder::class,
            ReservationsSeeder::class,
            QuestSeeder::class,

            BadgesSeeder::class,

            CouponsSeeder::class,
            CouponsPerUserSeeder::class,
            QuestPerUserSeeder::class,
            BadgesPerUserSeeder::class,
        ]);
    }
}
