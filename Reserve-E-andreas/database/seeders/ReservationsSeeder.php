<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsSeeder extends Seeder
{
    public function run()
    {
        DB::table('reservations')->insert([
            ['user_id' => 1, 'charging_station_id' => 1, 'date_of_reservation' => '2024-12-01 10:00:00'],
            ['user_id' => 2, 'charging_station_id' => 2, 'date_of_reservation' => '2024-12-02 11:00:00'],
            ['user_id' => 3, 'charging_station_id' => 3, 'date_of_reservation' => '2024-12-03 12:00:00'],
            ['user_id' => 4, 'charging_station_id' => 4, 'date_of_reservation' => '2024-12-04 13:00:00'],
            ['user_id' => 5, 'charging_station_id' => 5, 'date_of_reservation' => '2024-12-05 14:00:00'],
        ]);
    }
}

