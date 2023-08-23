<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();
        User::create([
            'name' => 'Windy Sabtami',
            'email' => 'windysabtami85@gmail.com',
            'email_verified_at'  => now(),
            'role' => 'admin',
            'phone' => '08123456789',
            'bio' => 'IT Developer',

            'password' => Hash::make('12345'),
        ]);
        User::create([
            'name' => 'Azka Jihan',
            'email' => 'azkajihan92@gmail.com',
            'email_verified_at'  => now(),
            'role' => 'Superadmin',
            'phone' => '08123456789',
            'bio' => 'IT Engineer',

            'password' => Hash::make('12345'),
        ]);
    }
}
