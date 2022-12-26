<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new Country();
        $obj->cou_name = 'Colombia';
        $obj->save();

        $obj2 = new Country();
        $obj2->cou_name = 'Venezuela';
        $obj2->save();

        $obj3 = new Country();
        $obj3->cou_name = 'Brazil';
        $obj3->save();

        $obj4 = new Country();
        $obj4->cou_name = 'Chile';
        $obj4->save();

        $obj5 = new Country();
        $obj5->cou_name = 'Argentina';
        $obj5->save();
    }
}
