<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'username' => 'William',
            'email'    => 'w04107879@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
