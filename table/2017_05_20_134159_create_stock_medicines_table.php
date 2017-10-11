<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->integer("price",  $autoIncrement=false);
            $table->integer("discount",  $autoIncrement=false);
            $table->smallInteger("quantity",  $autoIncrement=false, $unsigned=true);
            $table->dateTime('date');
            $table->integer('medicinesid')->unsigned();
            $table->integer('retail_marketersid')->unsigned();
            $table->foreign('retail_marketersid')->references('id')->on('retail_marketers');
            $table->foreign('medicinesid')->references('id')->on('medicines');
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
        Schema::dropIfExists('stock_medicines');
    }
}
