<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'username' => 'Admin',
            'password' => bcrypt('12345678'),
            'duplicate' => '12345678',
            'level' => 'Admin',
            'telp' => '088707445993',
        ]);
    }
}
