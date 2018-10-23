<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnToVendorDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_to_vendor_detail', function (Blueprint $table) {
            $table->increments('ReturnToVendorDetailId');
            $table->unsignedInteger('ReturnToVendorId');
            $table->unsignedInteger('ItemId');
            $table->integer('QuantityReturned');

            $table->foreign('ReturnToVendorId')->references('ReturnToVendorId')->on('return_to_vendor');
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
        Schema::dropIfExists('return_to_vendor_detail');
    }
}
