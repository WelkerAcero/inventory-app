<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new Department();
        $obj->dep_name = 'Santander';
        $obj->country(1);
        $obj->save();

        $obj_1 = new Department();
        $obj_1->dep_name = 'Bogota';
        $obj_1->country(1);
        $obj_1->save();

        $obj_2 = new Department();
        $obj_2->dep_name = 'Vichada';
        $obj_2->country(1);
        $obj_2->save();
        
        $obj_3 = new Department();
        $obj_3->dep_name = 'Tolima';
        $obj_3->country(1);
        $obj_3->save();
    }
}
