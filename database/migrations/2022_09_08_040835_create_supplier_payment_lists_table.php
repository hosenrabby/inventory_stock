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
        Schema::create('supplier_payment_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplierID');
            $table->foreign('supplierID')->references('id')->on('suppliers');
            $table->string('supplierEmail');
            $table->string('supplierContact');
            $table->string('paymentDate');
            $table->string('transactionMethod');
            $table->decimal('paymentAmount',10,2);
            $table->string('note');
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
        Schema::dropIfExists('supplier_payment_lists');
    }
};
