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
            $table->integer('pid');
            $table->foreignId('productID')->constrained('productstock_manages');
            $table->string('prodCode');
            $table->string('invNumber');
            $table->string('purchaseDate');
            $table->string('catagoryName');
            $table->string('subCatagoryName')->default('No Name');
            $table->string('supplierName');
            $table->integer('prodQty');
            $table->decimal('prodRate',8,2);
            $table->decimal('totalPrice',8,2);
            $table->decimal('grandTotal',8,2);
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
