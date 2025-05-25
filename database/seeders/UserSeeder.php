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
        User::create([
        'name' => 'Admin',
        'email' => 'admin@pwa.rs',
        'password' => Hash::make('admin'),
        'role' => 'admin',
    ]);

    User::create([
        'name' => 'Editor',
        'email' => 'editor@pwa.rs',
        'password' => Hash::make('editor'),
        'role' => 'editor',
    ]);

    User::create([
        'name' => 'User',
        'email' => 'user@pwa.rs',
        'password' => Hash::make('user'),
        'role' => 'registered',
    ]);
    User::create([
        'name' => 'User2',
        'email' => 'user2@pwa.rs',
        'password' => Hash::make('user'),
        'role' => 'admin',
    ]);
    User::create([
        'name' => 'User3',
        'email' => 'user3@pwa.rs',
        'password' => Hash::make('user'),
        'role' => 'admin',
    ]);
    }
}
