<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('OrderDetailId');
            $table->unsignedInteger('OrderId');
            $table->unsignedInteger('ItemId');
            $table->integer('QuantityOrdered');

            $table->foreign('OrderId')->references('OrderId')->on('order');
            $table->foreign('ItemId')->references('ItemId')->on('inventory_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
