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
        Schema::create('sales_products', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->string('invNumber');
            $table->integer('customerID');
            $table->string('customerName');
            $table->string('purchaseDate');
            $table->foreignId('productID')->constrained('productstock_manages');
            $table->string('prodCode');
            $table->integer('prodQty');
            $table->decimal('prodRate', 8,2);
            $table->decimal('totalPrice', 8,2);
            $table->decimal('grandTotal', 10,2);
            $table->decimal('paidAmount', 10,2);
            $table->decimal('duesAmount', 10,2);
            $table->string('note')->default('------');
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
        Schema::dropIfExists('sales_products');
    }
};
