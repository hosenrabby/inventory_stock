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
        Schema::create('customerpayment_lists', function (Blueprint $table) {
            $table->id();
            $table->string('customerName');
            $table->string('customerEmail')->default('customer@email.com');
            $table->string('customerContact')->default('01XXXXXXXXX');
            $table->string('paymentDate');
            $table->string('transactionMethod')->default('------');
            $table->decimal('custoPrevBalance',10,2)->default(00.00);
            $table->decimal('paymentAmount',10,2)->default(00.00);
            $table->decimal('custoCarrentBalance',10,2)->default(00.00);
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
        Schema::dropIfExists('customerpayment_lists');
    }
};
