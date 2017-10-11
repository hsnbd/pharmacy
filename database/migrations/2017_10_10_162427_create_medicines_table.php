<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->integer("price",  $autoIncrement=false);
            $table->integer("discount",  $autoIncrement=false);
            $table->integer('stock',  $autoIncrement=false);
            $table->smallInteger("least_order",  $autoIncrement=false);
            // $table->string('picture1', 10);
            // $table->string('picture2', 10);
            // $table->string('picture3', 10);
            $table->integer('sub_categoriesid')->unsigned();
            $table->integer('unitsid')->unsigned();
            $table->integer('genericsid')->unsigned();
            $table->integer('powersid')->unsigned();

            $table->foreign('sub_categoriesid')->references('id')->on('sub_categories');
            $table->foreign('unitsid')->references('id')->on('units');
            $table->foreign('genericsid')->references('id')->on('generics');
            $table->foreign('powersid')->references('id')->on('powers');
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
        Schema::dropIfExists('medicines');
    }
}
