<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'alamat' => 'Kampus',
            'no_hp' => '089656978016',
            // 'potoprofile' => 'Kampus',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'isAdmin' => '3'
        ]);
    }
}
