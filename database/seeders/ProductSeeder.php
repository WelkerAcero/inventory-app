<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pro = new Product();
        $pro->pro_code = 'ABC';
        $pro->pro_img = 'https://i.pinimg.com/550x/9e/f1/d8/9ef1d83080f0fc5691a44e11a333c000.jpg';
        $pro->pro_name = 'Pininm';
        $pro->pro_brand = 'Pichi';
        $pro->pro_color = 'Azul';
        $pro->pro_model = null;
        $pro->pro_description = null;
        $pro->pro_presentation = 'unidad';
        $pro->pro_stock = 10;
        $pro->pro_min_stock = null;
        $pro->pro_max_stock = null;
        $pro->pro_purchased_price = null;
        $pro->pro_cost = 80000;
        $pro->pro_wholesale_cost = null;
        $pro->pro_iva = null;
        $pro->pro_state = 1;
        $pro->pro_discount = null;
        $pro->category_id = 2;
        $pro->supplier_id = 1;

        $pro->save();
    }
}
