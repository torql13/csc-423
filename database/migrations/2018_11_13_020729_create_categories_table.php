<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('CategoryId');
            $table->string('Name');
        });

        DB::table('categories')->insert([
            ['Name' => 'Candy & Food Itemes'],
            ['Name' => 'Tobacco'],
            ['Name' => 'Beverage Alcohol'],
            ['Name' => 'Stationery/Playing Cards'],
            ['Name' => 'Electronics'],
            ['Name' => 'Health Aids'],
            ['Name' => 'Toys'],
            ['Name' => 'Housewares'],
            ['Name' => 'Fashion Accessories'],
            ['Name' => 'Lawn & Garden/Patio']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
