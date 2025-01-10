<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponsSeeder extends Seeder
{
    public function run()
    {
        DB::table('coupons')->insert([
            ['name' => 'Gutscheine von Unternehmen', 'description' => 'Von Unternehmen bereitgestellte Gutscheine', 'points_required' => 500],
            ['name' => 'Vorrang-Reservierung Pass', 'description' => 'Einmaliger Zugang zu einer Ladestation mit hohem Bedarf', 'points_required' => 250],
            ['name' => 'Gebührenfreie Reservierung', 'description' => 'Kostenlose Reservierung, wenn eine Gebühr anfällt', 'points_required' => 1000],
            ['name' => 'Verlängerte Reservierungsfrist', 'description' => 'Zusätzliche 30 Minuten für die Reservierung', 'points_required' => 200],
            ['name' => 'Zentraler Standort Reservierung', 'description' => 'Freischaltung der Reservierung an zentralen Ladestationen', 'points_required' => 200],
        ]);
    }
}

