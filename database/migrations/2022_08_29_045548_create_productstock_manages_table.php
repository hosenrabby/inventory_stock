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
<<<<<<< HEAD
            // $table->string('prodName');
            // $table->string('prodCode');
            // $table->string('purchaseDate');
            // $table->string('recieveDate');
            // $table->string('prodType');
            // $table->intiger('prodQty');
            // $table->decimal('prodPrice',8,2);
            // $table->decimal('totalPrice',8,2);
            // $table->decimal('paidAmmount',8,2);
            // $table->decimal('duesAmmount',8,2);
=======
            $table->string('prodName');
            $table->string('prodCode');
            $table->string('purchaseDate');
            $table->string('recieveDate');
            $table->string('prodType');
            $table->integer('prodQty');
            $table->decimal('prodPrice',8,2);
            $table->decimal('totalPrice',8,2);
            $table->decimal('paidAmmount',8,2);
            $table->decimal('duesAmmount',8,2);
            $table->integer('suplierID');
            $table->integer('catagoryID');
>>>>>>> 5c9f4511fe133d756fa55edeb043c627c35e8aca
            // $table->unsignedBigInteger('suplierID');
            // $table->foreign('suplierID')->references('id')->on('suplierInfo');
            // $table->unsignedBigInteger('catagoryID');
            // $table->foreign('catagoryID')->references('id')->on('catagory');
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
