<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new Role();
        $obj->rol_name = 'Admin';
        $obj->save();

        $obj_1 = new Role();
        $obj_1->rol_name = 'Customer';
        $obj_1->save();
    }
}
