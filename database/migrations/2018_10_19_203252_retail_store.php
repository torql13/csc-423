<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RetailStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RetailStore', function (Blueprint $table) {
            $table->increments('StoreId');
            $table->string('StoreCode')->unique();
            $table->string('StoreName');
            $table->string('Address');
            $table->string('City');
            $table->string('State');
            $table->string('ZIP');
            $table->string('Phone');
            $table->string('ManagerName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RetailStore');
    }
}
