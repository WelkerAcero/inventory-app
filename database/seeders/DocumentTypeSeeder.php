<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new DocumentType();
        $obj->doc_name = 'CC';
        $obj->save();

        $obj_1 = new DocumentType();
        $obj_1->doc_name = 'TI';
        $obj_1->save();

        $obj_2 = new DocumentType();
        $obj_2->doc_name = 'CE';
        $obj_2->save();

        $obj_3 = new DocumentType();
        $obj_3->doc_name = 'PAP';
        $obj_3->save();
    }
}
