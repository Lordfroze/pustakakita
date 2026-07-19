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
        // Administrator
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@pustaka.test',
            'password' => Hash::make('password'),
            'role' => 'administrator',
        ]);

        // Petugas
        User::create([
            'name' => 'Petugas Perpustakaan',
            'email' => 'petugas@pustaka.test',
            'password' => Hash::make('password'),
            'role' => 'petugas',
        ]);
    }
}
