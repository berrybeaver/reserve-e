<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Alice', 'lastname' => 'Smith', 'email' => 'alice.smith@example.com', 'password' =>'password123', 'admin' => false, 'vehicle' => 'Tesla Model 3', 'last_claimed' => '2024-12-01', 'points' => 100],
            ['name' => 'Bob', 'lastname' => 'Brown', 'email' => 'bob.brown@example.com', 'password' =>'password123', 'admin' => false, 'vehicle' => 'Nissan Leaf', 'last_claimed' => '2024-12-02', 'points' => 200],
            ['name' => 'Charlie', 'lastname' => 'Davis', 'email' => 'charlie.davis@example.com', 'password' => 'password123', 'admin' => true, 'vehicle' => 'BMW i3', 'last_claimed' => '2024-12-03', 'points' => 300],
            ['name' => 'Diana', 'lastname' => 'Evans', 'email' => 'diana.evans@example.com', 'password' => 'password123', 'admin' => false, 'vehicle' => 'Chevy Bolt', 'last_claimed' => '2024-12-04', 'points' => 400],
            ['name' => 'Evan', 'lastname' => 'Garcia', 'email' => 'evan.garcia@example.com', 'password' => 'password123', 'admin' => false, 'vehicle' => 'Audi e-tron', 'last_claimed' => '2024-12-05', 'points' => 500],
        ]);
    }
}

