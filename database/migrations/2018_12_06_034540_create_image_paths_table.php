<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagePathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_paths', function (Blueprint $table) {
            $table->increments('PathId');
            $table->string('Path');
        });

        DB::table('image_paths')->insert([
            ['Path' => 'images/$1-15.jpg'],
            ['Path' => 'images/$1-65.jpg'],
            ['Path' => 'images/$1-65_sale.jpg'],
            ['Path' => 'images/1_subject_note.jpg'],
            ['Path' => 'images/10_pk_washable.jpg'],
            ['Path' => 'images/40_off.jpg'],
            ['Path' => 'images/apricots.jpg'],
            ['Path' => 'images/barbie_fashionistas.jpg'],
            ['Path' => 'images/bass_pro.jpg'],
            ['Path' => 'images/bernoulli_toy_car.jpg'],
            ['Path' => 'images/bird_figure_blue.jpg'],
            ['Path' => 'images/bird_figure_red.jpg'],
            ['Path' => 'images/bowl_appetit.jpg'],
            ['Path' => 'images/brachs_maple.jpg'],
            ['Path' => 'images/campbells_spagh_orig.jpg'],
            ['Path' => 'images/cars_movie_toy_car_set.jpg'],
            ['Path' => 'images/chair_blue.jpg'],
            ['Path' => 'images/cheez_whiz.jpg'],
            ['Path' => 'images/chips_ahoy.jpg'],
            ['Path' => 'images/composition_01.jpg'],
            ['Path' => 'images/composition_02.jpg'],
            ['Path' => 'images/composition_03.jpg'],
            ['Path' => 'images/compositions.jpg'],
            ['Path' => 'images/construction_paper.jpg'],
            ['Path' => 'images/cooking_play_set.jpg'],
            ['Path' => 'images/cupcake_shop_doll.jpg'],
            ['Path' => 'images/disney_bubble_machine.jpg'],
            ['Path' => 'images/dizzy_doo_doll.jpg'],
            ['Path' => 'images/doc_hudson_toy_car.jpg'],
            ['Path' => 'images/dole_pears.jpg'],
            ['Path' => 'images/donald.jpg'],
            ['Path' => 'images/extra_gum_classic_bubble.jpg'],
            ['Path' => 'images/extra_gum_polar_ice.jpg'],
            ['Path' => 'images/fc_grill_14.jpg'],
            ['Path' => 'images/fg_apple_juice.jpg'],
            ['Path' => 'images/fg_cheddar_fries.jpg'],
            ['Path' => 'images/fg_cheese_dip_crackers.jpg'],
            ['Path' => 'images/fg_cookies.jpg'],
            ['Path' => 'images/fg_cookies_h.jpg'],
            ['Path' => 'images/fg_cranberry_apple..jpg'],
            ['Path' => 'images/fg_crangrape.jpg'],
            ['Path' => 'images/fg_hot_fries.jpg'],
            ['Path' => 'images/fg_lemon_creme.jpg'],
            ['Path' => 'images/fg_lemon_short.jpg'],
            ['Path' => 'images/fg_or_app_pi.jpg'],
            ['Path' => 'images/fg_raspberry_creme.jpg'],
            ['Path' => 'images/fg_ravioli.jpg'],
            ['Path' => 'images/fg_stiped_chocolate.jpg'],
            ['Path' => 'images/fg_wafers.jpg'],
            ['Path' => 'images/fg_water_enhancer.jpg'],
            ['Path' => 'images/fg_water_enhancer_2.jpg'],
            ['Path' => 'images/foam_puzzle.jpg'],
            ['Path' => 'images/folgers.jpg'],
            ['Path' => 'images/freshleys_honey_buns.jpg'],
            ['Path' => 'images/freshleys_swiss_rolls.jpg'],
            ['Path' => 'images/freshleys_buddy_bars.jpg'],
            ['Path' => 'images/garden_flower.jpg'],
            ['Path' => 'images/garden_stake.jpg'],
            ['Path' => 'images/garden_stake_01.jpg'],
            ['Path' => 'images/garden_stake_02.jpg'],
            ['Path' => 'images/garlic_powder.jpg'],
            ['Path' => 'images/gift_bag.jpg'],
            ['Path' => 'images/highlighters.jpg'],
            ['Path' => 'images/hot_wheels.jpg'],
            ['Path' => 'images/jelly_beans.jpg'],
            ['Path' => 'images/kids_work_toy_blocks.jpg'],
            ['Path' => 'images/lalaloopsy.jpg'],
            ['Path' => 'images/lance_cheese_pb_crackers.jpg'],
            ['Path' => 'images/lance_pb_cookies.jpg'],
            ['Path' => 'images/lance_pb_crackers.jpg'],
            ['Path' => 'images/lemoheads.jpg'],
            ['Path' => 'images/lunch_box.jpg'],
            ['Path' => 'images/marvel_01.jpg'],
            ['Path' => 'images/master_card_gift_card.jpg'],
            ['Path' => 'images/mater.jpg'],
            ['Path' => 'images/mater_toy_car.jpg'],
            ['Path' => 'images/maxwell_house.jpg'],
            ['Path' => 'images/mcqueen_toy_car.jpg'],
            ['Path' => 'images/mech_pencils.jpg'],
            ['Path' => 'images/mentos.jpg'],
            ['Path' => 'images/mickey.jpg'],
            ['Path' => 'images/mikeandike.jpg'],
            ['Path' => 'images/minnie_2.jpg'],
            ['Path' => 'images/minnie_mouse_plush.jpg'],
            ['Path' => 'images/mixed_berries.jpg'],
            ['Path' => 'images/mondo.jpg'],
            ['Path' => 'images/mondo_berry.jpg'],
            ['Path' => 'images/monster_high.jpg'],
            ['Path' => 'images/moon_pie.jpg'],
            ['Path' => 'images/moon_pie_vertical.jpg'],
            ['Path' => 'images/mountain_racer_toy_car.jpg'],
            ['Path' => 'images/ninja_turtles_golf_set.jpg'],
            ['Path' => 'images/no_image_found.jpg'],
            ['Path' => 'images/notebook_01.jpg'],
            ['Path' => 'images/notebook_02.jpg'],
            ['Path' => 'images/notebooks.jpg'],
            ['Path' => 'images/obd_gloves.jpg'],
            ['Path' => 'images/obd_snail.jpg'],
            ['Path' => 'images/obd_squirrel.jpg'],
            ['Path' => 'images/onion_powder.jpg'],
            ['Path' => 'images/papermate_black.jpg'],
            ['Path' => 'images/papermate_colors.jpg'],
            ['Path' => 'images/papermate_pencils.jpg'],
            ['Path' => 'images/pencils.jpg'],
            ['Path' => 'images/perm_markers.jpg'],
            ['Path' => 'images/pudding_v1.jpg'],
            ['Path' => 'images/radioshack.jpg'],
            ['Path' => 'images/red_toy_car.jpg'],
            ['Path' => 'images/reeses.jpg'],
            ['Path' => 'images/reeses_pcs.jpg'],
            ['Path' => 'images/reeses_vertical.jpg'],
            ['Path' => 'images/regal_gift_card.jpg'],
            ['Path' => 'images/sesame_street_toy.jpg'],
            ['Path' => 'images/sharpies_black.jpg'],
            ['Path' => 'images/sharpies_blue.jpg'],
            ['Path' => 'images/sharpies_red.jpg'],
            ['Path' => 'images/shovel.jpg'],
            ['Path' => 'images/skittles.jpg'],
            ['Path' => 'images/snickers_bites.jpg'],
            ['Path' => 'images/solar_1.jpg'],
            ['Path' => 'images/sour_patch_kids.jpg'],
            ['Path' => 'images/sour_patch_kids_2.jpg'],
            ['Path' => 'images/spray_bottle.jpg'],
            ['Path' => 'images/sprinkler_ring.jpg'],
            ['Path' => 'images/stacking_chair_01.jpg'],
            ['Path' => 'images/sugar_babies.jpg'],
            ['Path' => 'images/texas_pete.jpg'],
            ['Path' => 'images/toyota_toy_car.jpg'],
            ['Path' => 'images/umbrella.jpg'],
            ['Path' => 'images/vanilla_visa_gift_card.jpg'],
            ['Path' => 'images/visa_gift_card.jpg'],
            ['Path' => 'images/waste_blue.jpg'],
            ['Path' => 'images/waste_purple.jpg'],
            ['Path' => 'images/water_blaster.jpg'],
            ['Path' => 'images/watercolors.jpg'],
            ['Path' => 'images/watercolors_2.jpg'],
            ['Path' => 'images/western_union_gift_card.jpg'],
            ['Path' => 'images/western_union_reloadable.jpg'],
            ['Path' => 'images/wise_tortilla.jpg'],
            ['Path' => 'images/yogurt_raisin.jpg']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_paths');
    }
}
