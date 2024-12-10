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
            'avatar_url' =>'',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123'),
        ]);
        \App\Models\User::factory()->create([
            'id' => 2,
            'name' => 'Staff Test',
            'avatar_url' =>'',
            'email' => 'Staff@gmail.com',
            'password' => bcrypt('123'),
        ]);


        \App\Models\Category::factory(10)->create();
        \App\Models\Suppliers::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Customer::factory(3)->create();
    }
}