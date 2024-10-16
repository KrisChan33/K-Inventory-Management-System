<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'id' => 1,
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123'),
        ]);
        \App\Models\User::factory()->create([
            'id' => 2,
            'name' => 'Test User',
            'email' => 'testuser@gmail.com',
            'password' => bcrypt('123'),
        ]);
        \App\Models\User::factory(10)->create();

    }
}