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
        Schema::create('stock_managment', function (Blueprint $table) {
            $table->id();
            $table->string('prodName');
            $table->string('prodCode');
            $table->string('prodType');
            $table->integer('prodQty');
            $table->decimal('prodPrice',8,2);
            // $table->unsignedBigInteger('productMangId');
            // $table->foreign('productMangId')->references('id')->on('productstock_manages');
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
        //
    }
};
