<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk membuat 1 user.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User Example',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
