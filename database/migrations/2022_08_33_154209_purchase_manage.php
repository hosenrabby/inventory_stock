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
        Schema::create('purchase_manage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productID');
            $table->foreign('productID')->references('id')->on('productstock_manages');
            $table->string('prodCode');
            $table->string('invNumber');
            $table->string('purchaseDate');
            $table->unsignedBigInteger('catagoryID');
            $table->foreign('catagoryID')->references('id')->on('categories');
            $table->unsignedBigInteger('subCatagoryID');
            $table->foreign('subCatagoryID')->references('id')->on('sub_categories')->default(0);
            $table->unsignedBigInteger('supplierID');
            $table->foreign('supplierID')->references('id')->on('suppliers');
            $table->integer('prodQty');
            $table->decimal('prodRate',8,2);
            $table->decimal('totalPrice',8,2);
            $table->decimal('paidAmount',8,2);
            $table->decimal('duesAmount',8,2);
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
