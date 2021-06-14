<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\AdminModel::insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@superadmin.com',
                'password' => '$2y$12$eKkGhWk1fug0Ni5Q7byJKOIggDYg7dZi6roHs5tkveUVlrhd6knSq', // 11111111
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$12$eKkGhWk1fug0Ni5Q7byJKOIggDYg7dZi6roHs5tkveUVlrhd6knSq', // 11111111
            ],
            [
                'name' => 'Merchant',
                'email' => 'merchant@merchant.com',
                'password' => '$2y$12$eKkGhWk1fug0Ni5Q7byJKOIggDYg7dZi6roHs5tkveUVlrhd6knSq', // 11111111
            ],
            [
                'name' => 'Driver',
                'email' => 'driver@driver.com',
                'password' => '$2y$12$eKkGhWk1fug0Ni5Q7byJKOIggDYg7dZi6roHs5tkveUVlrhd6knSq', // 11111111
            ],
        ]);
    }
}
