<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponsPerUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('coupons_per_user')->insert([
            ['coupon_id' => 1, 'user_id' => 1, 'used' => false], // User 1 has "Gutscheine von Unternehmen"
            ['coupon_id' => 2, 'user_id' => 1, 'used' => true],  // User 1 has used "Vorrang-Reservierung Pass"
            ['coupon_id' => 3, 'user_id' => 2, 'used' => false], // User 2 has "Gebührenfreie Reservierung"
            ['coupon_id' => 4, 'user_id' => 3, 'used' => false], // User 3 has "Verlängerte Reservierungsfrist"
            ['coupon_id' => 5, 'user_id' => 4, 'used' => true],  // User 4 has used "Zentraler Standort Reservierung"
            ['coupon_id' => 1, 'user_id' => 5, 'used' => false], // User 5 has "Gutscheine von Unternehmen"
        ]);
    }
}

