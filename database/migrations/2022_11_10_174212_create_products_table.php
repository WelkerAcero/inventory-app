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
            $table->longText('pro_img');
            $table->string('pro_name', 40);
            $table->string('pro_description', 200);
            $table->integer('pro_stock');
            $table->float('pro_cost', 8, 2);
            $table->integer('pro_iva');
            $table->foreignId('presentation_id')->nullable()->constrained('product_presentations')->onUpdate('cascade')->onDelete('set null');
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
