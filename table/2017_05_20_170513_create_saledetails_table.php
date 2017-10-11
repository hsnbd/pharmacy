<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaledetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saledetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shipping', 250);
            $table->integer('quantity',  $autoIncrement=false);
            $table->integer('discount',  $autoIncrement=false);
            $table->dateTime('date');
            $table->integer('salesid')->unsigned();
            $table->integer('stock_medicinesid')->unsigned();
            $table->foreign('salesid')->references('id')->on('sales');
            $table->foreign('stock_medicinesid')->references('id')->on('stock_medicines');
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
        Schema::dropIfExists('saledetails');
    }
}
