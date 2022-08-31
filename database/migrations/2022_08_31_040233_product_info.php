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
        Schema::create('product_info', function (Blueprint $table) {
            $table->id();
            $table->string('prodName');
            $table->string('prodCode');
            $table->unsignedBigInteger('catagaryID');
            $table->foreign('catagaryID')->references('id')->on('categories');
            $table->unsignedBigInteger('subCatageryID');
            $table->foreign('subCatageryID')->references('id')->on('sub_categories');
            $table->decimal('prodRate');
            $table->decimal('stockBalance');
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
