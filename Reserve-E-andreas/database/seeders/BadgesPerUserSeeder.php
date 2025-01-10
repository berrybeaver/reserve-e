<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgesPerUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('badges_per_user')->insert([
            ['badge_id' => 1, 'user_id' => 1, 'counter_for_fulfillment' => 0], // User 1 has fulfilled the condition for "Sämling (Beginner)"
            ['badge_id' => 2, 'user_id' => 2, 'counter_for_fulfillment' => 2], // User 2 has "Keimling (Novice)" badge condition fulfilled
            ['badge_id' => 3, 'user_id' => 3, 'counter_for_fulfillment' => 8], // User 3 has reached "Grünes Blatt (Intermediate)"
            ['badge_id' => 4, 'user_id' => 4, 'counter_for_fulfillment' => 15], // User 4 is progressing toward "Schössling (Advanced)"
            ['badge_id' => 5, 'user_id' => 5, 'counter_for_fulfillment' => 28], // User 5 is at the "Eiche (Expert)" level
        ]);
    }
}

