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
        Schema::create('sals_short_mangs', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->string('invNumber');
            $table->string('customerName');
            $table->string('purchaseDate');
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
        Schema::dropIfExists('sals_short_mangs');
    }
};
