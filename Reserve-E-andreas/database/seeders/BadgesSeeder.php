<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgesSeeder extends Seeder
{
    public function run()
    {
        DB::table('badges')->insert([
            ['name' => 'Sämling (Beginner)', 'condition' => 1],
            ['name' => 'Keimling (Novice)', 'condition' => 3],
            ['name' => 'Grünes Blatt (Intermediate)', 'condition' => 10],
            ['name' => 'Schössling (Advanced)', 'condition' => 25],
            ['name' => 'Eiche (Expert)', 'condition' => 50],
            ['name' => 'Öko-Pionier (Elite)', 'condition' => 100],
            ['name' => 'Naturbeste Freunde (Meister)', 'condition' => 200],
        ]);
    }
}

