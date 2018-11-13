<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('CategoryId');
            $table->string('Name');
        });

        DB::table('divisions')->insert([
            ['Name' => 'Food Convenience'],
            ['Name' => 'Food Grocery'],
            ['Name' => 'General Merchandise'],
            ['Name' => 'Miscellaneous'],
            ['Name' => 'Seasonal Merchandise']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}
