<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatchListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watch_lists', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('usersid')->unsigned();
           $table->integer('medicinesid')->unsigned();
           $table->foreign('usersid')->references('id')->on('users');
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
        Schema::dropIfExists('watch_lists');
    }
}
