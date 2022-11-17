<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.  
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('sup_code', 20)->unique();
            $table->string('sup_name', 40);
            $table->string('sup_lastname', 40)->nullable();
            $table->string('sup_cellphone', 13)->nullable();
            $table->string('sup_email')->nullable()->unique();
            
            $table->foreignId('document_type_id')->nullable()
                ->constrained('document_types')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->string('document_number', 10)->nullable();

            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('sup_city', 40);
            $table->string('sup_street', 50);
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
        Schema::dropIfExists('suppliers');
    }
}
