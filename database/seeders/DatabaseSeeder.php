<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // To avoid duplicate entry errors, check if the user already exists before creating
        $userEmail = 'test@example.com';
        if (User::where('email', $userEmail)->doesntExist()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => $userEmail,
            ]);
        }
        
        // Uncomment the line below to create 10 random users
        // User::factory(10)->create();
    }
}
