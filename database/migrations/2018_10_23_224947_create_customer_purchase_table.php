<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_purchase', function (Blueprint $table) {
            $table->increments('CustomerPurchaseId');
            $table->unsignedInteger('CustomerId');
            $table->unsignedInteger('ItemId');
            $table->unsignedInteger('StoreId');
            $table->integer('QuantityPurchased');
            $table->dateTime('DateTimeOfPurchase');

            $table->foreign('CustomerId')->references('CustomerId')->on('customer');
            $table->foreign('ItemId')->references('ItemId')->on('inventory_item');
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
        Schema::dropIfExists('customer_purchase');
    }
}
