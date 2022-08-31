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
            $table->unsignedBigInteger('productID');
            $table->foreign('productID')->references('id')->on('product_info');
            $table->string('prodCode');
            $table->unsignedBigInteger('catagaryID');
            $table->foreign('catagaryID')->references('id')->on('categories');
            $table->unsignedBigInteger('subCatageryID');
            $table->foreign('subCatageryID')->references('id')->on('sub_categories');
            $table->string('purchaseDate');
            $table->unsignedBigInteger('suplierID');
            $table->foreign('suplierID')->references('id')->on('suppliers');
            $table->string('invoice_number');
            $table->integer('prodQty');
            $table->decimal('prodPrice',8,2);
            $table->decimal('totalPrice',8,2);
            $table->decimal('paidAmmount',8,2);
            $table->decimal('duesAmmount',8,2);
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
