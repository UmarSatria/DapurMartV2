<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Uncomment and use User factory to create an admin user
        User::factory()->create([
            'photo_profile' =>  'default.jpg',
            'fullname' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone_number' =>  '08123456789',
            'password' => Hash::make('12345678'),
            'role' => 'Admin',
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
