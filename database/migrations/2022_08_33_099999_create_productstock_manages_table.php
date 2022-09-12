<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productstock_manages', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('prodCode');
            $table->foreignID('catagoryID')->constrained('categories');
            $table->foreignID('subCatagoryID')->constrained('sub_categories')->default(0);
            $table->decimal('prodRate',8,2);
            $table->integer('stockBalance');
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
        Schema::dropIfExists('productstock_manages');
    }
};
