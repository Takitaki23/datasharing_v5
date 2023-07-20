<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Saso Account
        User::factory()->create([
            'name' => 'saso',
            'email' => 'saso@gmail.com',
            'password' => Hash::make('saso1234'),
            'role' => 'saso'
        ]);
        // Clinic Account
        User::factory()->create([
            'name' => 'clinic',
            'email' => 'clinic@gmail.com',
            'password' => Hash::make('clinic1234'),
            'role' => 'clinic'
        ]);
        // Guidance Account
        User::factory()->create([
            'name' => 'guidance',
            'email' => 'guidance@gmail.com',
            'password' => Hash::make('guidance1234'),
            'role' => 'guidance'
        ]);
           // Cashier Account
        User::factory()->create([
            'name' => 'cashier',
            'email' => 'cashier@gmail.com',
            'password' => Hash::make('cashier1234'),
            'role' => 'cashier'
        ]);

        // error_log($data);
        // User::factory()->create();

    }
}
    