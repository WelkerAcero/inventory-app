<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new Permission();
        $obj->per_name = 'Create';
        $obj->save();

        $obj_1 = new Permission();
        $obj_1->per_name = 'Read';
        $obj_1->save();

        $obj_2 = new Permission();
        $obj_2->per_name = 'Update';
        $obj_2->save();

        $obj_3 = new Permission();
        $obj_3->per_name = 'Delete';
        $obj_3->save();
        
    }
}
