<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestPerUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('quest_per_user')->insert([
            ['quest_id' => 1, 'user_id' => 1, 'counter_for_fulfillment' => 0, 'claimed' => false], // User 1 started "Complete your first reservation" but hasn't claimed it
            ['quest_id' => 2, 'user_id' => 2, 'counter_for_fulfillment' => 1, 'claimed' => false],  // User 2 completed and claimed "Use a station in demand"
            ['quest_id' => 3, 'user_id' => 3, 'counter_for_fulfillment' => 3, 'claimed' => false], // User 3 is working on "Reserve a station 5 times"
            ['quest_id' => 4, 'user_id' => 4, 'counter_for_fulfillment' => 0, 'claimed' => false], // User 4 hasn't started "Refer a friend"
            ['quest_id' => 5, 'user_id' => 5, 'counter_for_fulfillment' => 3, 'claimed' => false],  // User 5 completed and claimed "Use 3 different stations"
        ]);
    }
}

