<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
                'name' => 'Shariq',
                'email' => 'shariqrvt@gmail.com',
                'password' => '$2y$12$eKkGhWk1fug0Ni5Q7byJKOIggDYg7dZi6roHs5tkveUVlrhd6knSq', // 11111111
            ]
        ]);
    }
}
