<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vendor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vendor', function (Blueprint $table) {
            $table->increments('VendorId');
            $table->string('VendorCode')->unique();
            $table->string('StoreName');
            $table->string('VendorName');
            $table->string('Address');
            $table->string('City');
            $table->string('State');
            $table->string('Zip');
            $table->string('Phone');
            $table->string('ContactPerson');
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
        Schema::dropIfExists('Vendor');
    }
}
