<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Example User',
            'email' => 'example.123@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
