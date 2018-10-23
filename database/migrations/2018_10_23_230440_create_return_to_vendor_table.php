<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnToVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_to_vendor', function (Blueprint $table) {
            $table->increments('ReturnToVendorId');
            $table->unsignedInteger('VendorId');
            $table->unsignedInteger('StoreId');
            $table->dateTime('DateTimeOfReturn');

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
        Schema::dropIfExists('return_to_vendor');
    }
}
