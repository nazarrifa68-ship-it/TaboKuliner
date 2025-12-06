<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin TaboKuliner',
            'email' => 'admin@tabokuliner.com',
            'phone' => '081234567890',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Customer
        User::create([
            'name' => 'Customer Test',
            'email' => 'customer@example.com',
            'phone' => '081234567891',
            'password' => Hash::make('customer123'),
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);
    }
}