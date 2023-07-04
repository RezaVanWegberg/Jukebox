<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserRezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'reza',
            'email' => 'reza@gmail.com',
            'email_verified_at' => now(),
            'password' => 'rezareza',
        ]);
    }
}
