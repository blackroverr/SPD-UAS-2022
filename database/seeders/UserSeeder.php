<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        \App\Models\User::insert([
            [ 
                'name' => 'budi',
                'email' => 'budi@email.com',
                'role_id' =>'1',
                'email_verified_at' => now(),
                'password' => '$2y$10$MUBUhjIRduBR/2WE4tdgtOrbbaJQj38BIGVoFIg.dA1rIWFOb5vhy', // password
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10)
            ]
        ]);

        // Fake users
        User::factory()->times(1)->create();
    }
}
