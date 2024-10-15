<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('admin'),
            'role'      => 'admin',
            'image'     => ''
        ]);

        User::create([
            'name'      => 'user1',
            'email'     => 'user1@gmail.com',
            'password'  => Hash::make('user1'),
            'role'      => 'user',
            'image'     => ''
        ]);

        User::create([
            'name'      => 'user2',
            'email'     => 'user2@gmail.com',
            'password'  => Hash::make('user2'),
            'role'      => 'user',
            'image'     => ''
        ]);

        User::create([
            'name'      => 'user3',
            'email'     => 'user3@gmail.com',
            'password'  => Hash::make('user3'),
            'role'      => 'user',
            'image'     => ''
        ]);
    }
}
