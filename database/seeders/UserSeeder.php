<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name'=>'Mushrif Maheen Mugdha',
            'email'=>'mushrifmaheen@gmail.com',
            'role'=>'admin',
            'email_verified_at'=>now(),
            'password'=>'123'
        ]);
    }
}
