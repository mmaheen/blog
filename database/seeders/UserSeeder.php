<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@test.com',
            'password' => '0'
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@test.com',
            'password' => '0'
        ]);
    }
}
