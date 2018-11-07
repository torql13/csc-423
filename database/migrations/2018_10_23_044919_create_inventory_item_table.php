<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_item', function (Blueprint $table) {
            $table->increments('ItemId');
            $table->string('Description');
            $table->text('Size');
            $table->string('Division');
            $table->string('Department');
            $table->string('Category');
            $table->string('ItemCost');
            $table->string('ItemRetail');
            $table->string('ImageFileName');
            $table->unsignedInteger('VendorId');
            $table->string('Status')->default('Active');
            $table->foreign('VendorId')->references('VendorId')->on('vendor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_item');
    }
}
