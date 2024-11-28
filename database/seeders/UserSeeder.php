<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users = [];

        // for ($i = 1; $i <= 5; $i++) {
        //     $users[] = [
        //         'username' => 'user' . $i,
        //         'email' => 'user' . $i . '@gmail.com',
        //         'password' => Hash::make('123'),
        //         'activation_token' => Str::random(15),
        //         'role' => 'user',
        //         'is_active' => 1,
        //     ];
        // }

        // DB::table('users')->insert($users);

        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'activation_token' => Str::random(15),
            'role' => 'admin',
            'is_active' => 1
        ]);
    }
}
