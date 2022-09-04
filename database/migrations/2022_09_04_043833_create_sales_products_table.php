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
            $table->integer('invNumber');
            $table->foreign('customerID')->constrained('customers');
            $table->foreign('productID')->constrained('productstock_manages');
            $table->integer('prodCode');
            $table->integer('prodQty');
            $table->decimal('prodRate', 8,2);
            $table->decimal('totalPrice', 8,2);
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
