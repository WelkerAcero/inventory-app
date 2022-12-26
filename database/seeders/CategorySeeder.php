<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new Category();
        $obj->cat_name = 'Zapato';
        $obj->save();

        $obj_1 = new Category();
        $obj_1->cat_name = 'Camisa';
        $obj_1->save();
    }
}
