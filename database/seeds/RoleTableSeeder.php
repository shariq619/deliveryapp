<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name' => 'super-admin',
                'guard_name' => 'admin',
            ]
        ]);

        Role::insert([
            [
                'name' => 'admin',
                'guard_name' => 'admin',
            ]
        ]);

        Role::insert([
            [
                'name' => 'merchant',
                'guard_name' => 'admin',
            ]
        ]);

        Role::insert([
            [
                'name' => 'driver',
                'guard_name' => 'admin',
            ]
        ]);

        //

        DB::table('model_has_roles')->insert([
            'role_id' => '1',
            'model_type' => 'App\Models\Admin\AdminModel',
            'model_id' => '1',
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => '2',
            'model_type' => 'App\Models\Admin\AdminModel',
            'model_id' => '2',
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => '3',
            'model_type' => 'App\Models\Admin\AdminModel',
            'model_id' => '3',
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => '4',
            'model_type' => 'App\Models\Admin\AdminModel',
            'model_id' => '4',
        ]);










    }
}
