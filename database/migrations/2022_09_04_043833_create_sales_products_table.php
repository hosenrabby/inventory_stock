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
            $table->integer('invNumber');
            $table->foreignId('customerID')->constrained('customers');
            $table->string('purchaseDate');
            $table->foreignId('productName')->constrained('productstock_manages');
            $table->integer('prodCode');
            $table->integer('prodQty');
            $table->decimal('prodRate', 8,2);
            $table->decimal('totalPrice', 8,2);
            $table->decimal('grandTotal', 8,2);
            $table->decimal('paidAmount', 8,2);
            $table->decimal('duesAmount', 8,2);
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
