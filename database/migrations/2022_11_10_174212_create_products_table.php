<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            //pro_code Ya esta mendiante la migración [add_pro_code_to_products]
            $table->longText('pro_img');
            $table->string('pro_name', 40);
            $table->string('pro_brand', 20);
            $table->string('pro_model', 20);
            $table->string('pro_description', 200);
            //pro_state Ya esta mendiante la migración [add_pro_state_to_products]
            $table->string('pro_presentation', 20);
            $table->integer('pro_stock');
            $table->integer('pro_min_stock');
            $table->integer('pro_max_stock');
            $table->float('pro_purchased_price', 8, 2);
            $table->float('pro_cost', 8, 2);
            $table->float('pro_wholesale_cost', 8, 2);
            $table->integer('pro_iva');
            $table->integer('pro_discount');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
