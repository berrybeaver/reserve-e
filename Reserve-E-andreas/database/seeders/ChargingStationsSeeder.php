<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChargingStationsSeeder extends Seeder
{
    public function run()
    {
        DB::table('charging_stations')->insert([
            ['name' => 'Station A', 'coordinate' => '40.7128,-74.0060', 'in_demand' => false, 'points_as_reward' => 250, 'charger_type' => 1],
            ['name' => 'Station B', 'coordinate' => '34.0522,-118.2437', 'in_demand' => true, 'points_as_reward' => 50, 'charger_type' => 2],
            ['name' => 'Station C', 'coordinate' => '51.5074,-0.1278', 'in_demand' => false, 'points_as_reward' => 250, 'charger_type' => 3],
            ['name' => 'Station D', 'coordinate' => '48.8566,2.3522', 'in_demand' => true, 'points_as_reward' => 50, 'charger_type' => 1],
            ['name' => 'Station E', 'coordinate' => '35.6895,139.6917', 'in_demand' => false, 'points_as_reward' => 250, 'charger_type' => 2],
        ]);
    }
}

