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
            $table->string('pro_code');
            $table->longText('pro_img');
            $table->string('pro_name', 40);
            $table->string('pro_brand', 20)->nullable();
            $table->string('pro_model', 20)->nullable();
            $table->string('pro_description', 200)->nullable();
            $table->string('pro_presentation', 20);
            $table->integer('pro_stock');
            $table->integer('pro_min_stock')->nullable();
            $table->integer('pro_max_stock')->nullable();;
            $table->float('pro_purchased_price', 8, 2)->nullable();
            $table->float('pro_cost', 8, 2);
            $table->float('pro_wholesale_cost', 8, 2)->nullable();
            $table->integer('pro_iva')->nullable();
            $table->boolean('pro_state');
            $table->integer('pro_discount')->nullable();
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
