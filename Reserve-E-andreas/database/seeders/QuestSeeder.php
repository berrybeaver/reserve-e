<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestSeeder extends Seeder
{
    public function run()
    {
        DB::table('quests')->insert([
            ['name' => 'Quest 1', 'description' => 'Complete your first reservation', 'condition' => 1, 'reward_points' => 50],
            ['name' => 'Quest 2', 'description' => 'Use a station in demand', 'condition' => 1, 'reward_points' => 100],
            ['name' => 'Quest 3', 'description' => 'Reserve a station 5 times', 'condition' => 5, 'reward_points' => 200],
            ['name' => 'Quest 4', 'description' => 'Refer a friend', 'condition' => 1, 'reward_points' => 150],
            ['name' => 'Quest 5', 'description' => 'Use 3 different stations', 'condition' => 3, 'reward_points' => 250],
        ]);
    }
}

