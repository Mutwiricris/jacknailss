<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@jacknails.co.ke',
                'email_verified_at' => now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Grace Wanjiku',
                'email' => 'grace@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Mary Njeri',
                'email' => 'mary@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Sarah Muthoni',
                'email' => 'sarah@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Faith Akinyi',
                'email' => 'faith@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Jane Wambui',
                'email' => 'jane@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
