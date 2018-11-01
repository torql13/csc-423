<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('OrderId');
            $table->unsignedInteger('VendorId');
            $table->unsignedInteger('StoreId');
            $table->dateTime('DateTimeOfOrder');
            $table->string('Status');
            $table->dateTime('DateTimeOfFulfillment')->nullable();

            $table->foreign('VendorId')->references('VendorId')->on('vendor');
            $table->foreign('StoreId')->references('StoreId')->on('retail_store');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
