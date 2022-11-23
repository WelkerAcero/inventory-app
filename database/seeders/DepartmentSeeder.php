<?php

namespace Database\Seeders;

use App\Models\Country;
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
        $countries = Country::select('id')->get();
        
        $obj = new Department();
        $obj->dep_name = 'Santander';
        $obj->country_id = $countries[0]->id;
        $obj->save();

        $obj_1= new Department();
        $obj_1->dep_name = 'Bogota';
        $obj_1->country_id = $countries[0]->id;
        $obj_1->save();

        $obj_2= new Department();
        $obj_2->dep_name = 'Vichada';
        $obj_2->country_id = $countries[0]->id;
        $obj_2->save();
        /* dd($obj->country()); */
        /*var_dump($obj->country(1)); */
    }
}
