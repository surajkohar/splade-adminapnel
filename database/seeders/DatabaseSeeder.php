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
        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(10)->create();

        $role = Role::create(['name' => 'admin']);       //creating role admin

        $user = User::factory()->create([                //creating user
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role);                      //assigning role to user
    }
}
