<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('InventoryId');
            $table->unsignedInteger('StoreId');
            $table->unsignedInteger('ItemId');
            $table->integer('QuantityInStock');

            $table->foreign('StoreId')->references('StoreId')->on('retail_store');
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
        Schema::dropIfExists('inventory');
    }
}
