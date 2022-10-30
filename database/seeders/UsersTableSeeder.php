<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Brilyan',
            'email' => 'brilyannaathan@gmail.com',
            'password' => Hash::make('password123')
        ]);
        User::create([
            'name' => 'Riki',
            'email' => 'riki@gmail.com',
            'password' => Hash::make('password123')
        ]);
        User::create([
            'name' => 'Belinda',
            'email' => 'belinda@gmail.com',
            'password' => Hash::make('password123')
        ]);
        User::create([
            'name' => 'Lusita',
            'email' => 'lusita@gmail.com',
            'password' => Hash::make('password123')
        ]);
        User::create([
            'name' => 'Albertus',
            'email' => 'albertus@gmail.com',
            'password' => Hash::make('password123')
        ]);
    }
}
