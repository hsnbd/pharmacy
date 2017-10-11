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
            $table->integer('medicinesid')->unsigned();
            $table->integer('quantity',  $autoIncrement=false);
            $table->integer('discount',  $autoIncrement=false);
            $table->integer('shippingid')->unsigned();
            $table->dateTime('date');
            $table->boolean('done')->default(0);
            $table->foreign('medicinesid')->references('id')->on('medicines');
            $table->foreign('shippingid')->references('id')->on('shipping');
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
