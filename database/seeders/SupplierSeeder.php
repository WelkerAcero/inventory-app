<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new Supplier();
        $obj->sup_code = 'SS-PP-AA';
        $obj->sup_name = 'José Luis';
        $obj->sup_lastname = 'Acero';
        $obj->sup_cellphone = '3213655354';
        $obj->sup_email = 'universityestudios@gmail.com';
        $obj->document_type_id = 1;
        $obj->document_number = '1232587055';
        $obj->department_id = 1;
        $obj->sup_city = 'Bucaramanga';
        $obj->sup_street = 'Calle 63D #30-67';
        $obj->save();
    }
}
