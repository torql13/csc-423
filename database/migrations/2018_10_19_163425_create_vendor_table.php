<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor', function (Blueprint $table) {
            $table->increments('VendorId');
            $table->string('VendorCode')->unique();
            $table->string('VendorName');
            $table->string('Address');
            $table->string('City');
            $table->string('State');
            $table->string('ZIP');
            $table->string('Phone');
            $table->string('ContactPersonName');
            $table->string('Password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor');
    }
}