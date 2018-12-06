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
            ['Path' => '$1-15.jpg'],
            ['Path' => '$1-65.jpg'],
            ['Path' => '$1-65_sale.jpg'],
            ['Path' => '1_subject_note.jpg'],
            ['Path' => '10_pk_washable.jpg'],
            ['Path' => '40_off.jpg'],
            ['Path' => 'apricots.jpg'],
            ['Path' => 'barbie_fashionistas.jpg'],
            ['Path' => 'bass_pro.jpg'],
            ['Path' => 'bernoulli_toy_car.jpg'],
            ['Path' => 'bird_figure_blue.jpg'],
            ['Path' => 'bird_figure_red.jpg'],
            ['Path' => 'bowl_appetit.jpg'],
            ['Path' => 'brachs_maple.jpg'],
            ['Path' => 'campbells_spagh_orig.jpg'],
            ['Path' => 'cars_movie_toy_car_set.jpg'],
            ['Path' => 'chair_blue.jpg'],
            ['Path' => 'cheez_whiz.jpg'],
            ['Path' => 'chips_ahoy.jpg'],
            ['Path' => 'composition_01.jpg'],
            ['Path' => 'composition_02.jpg'],
            ['Path' => 'composition_03.jpg'],
            ['Path' => 'compositions.jpg'],
            ['Path' => 'construction_paper.jpg'],
            ['Path' => 'cooking_play_set.jpg'],
            ['Path' => 'cupcake_shop_doll.jpg'],
            ['Path' => 'disney_bubble_machine.jpg'],
            ['Path' => 'dizzy_doo_doll.jpg'],
            ['Path' => 'doc_hudson_toy_car.jpg'],
            ['Path' => 'dole_pears.jpg'],
            ['Path' => 'donald.jpg'],
            ['Path' => 'extra_gum_classic_bubble.jpg'],
            ['Path' => 'extra_gum_polar_ice.jpg'],
            ['Path' => 'fc_grill_14.jpg'],
            ['Path' => 'fg_apple_juice.jpg'],
            ['Path' => 'fg_cheddar_fries.jpg'],
            ['Path' => 'fg_cheese_dip_crackers.jpg'],
            ['Path' => 'fg_cookies.jpg'],
            ['Path' => 'fg_cookies_h.jpg'],
            ['Path' => 'fg_cranberry_apple..jpg'],
            ['Path' => 'fg_crangrape.jpg'],
            ['Path' => 'fg_hot_fries.jpg'],
            ['Path' => 'fg_lemon_creme.jpg'],
            ['Path' => 'fg_lemon_short.jpg'],
            ['Path' => 'fg_or_app_pi.jpg'],
            ['Path' => 'fg_raspberry_creme.jpg'],
            ['Path' => 'fg_ravioli.jpg'],
            ['Path' => 'fg_stiped_chocolate.jpg'],
            ['Path' => 'fg_wafers.jpg'],
            ['Path' => 'fg_water_enhancer.jpg'],
            ['Path' => 'fg_water_enhancer_2.jpg'],
            ['Path' => 'foam_puzzle.jpg'],
            ['Path' => 'folgers.jpg'],
            ['Path' => 'freshleys_honey_buns.jpg'],
            ['Path' => 'freshleys_swiss_rolls.jpg'],
            ['Path' => 'freshleys_buddy_bars.jpg'],
            ['Path' => 'garden_flower.jpg'],
            ['Path' => 'garden_stake.jpg'],
            ['Path' => 'garden_stake_01.jpg'],
            ['Path' => 'garden_stake_02.jpg'],
            ['Path' => 'garlic_powder.jpg'],
            ['Path' => 'gift_bag.jpg'],
            ['Path' => 'highlighters.jpg'],
            ['Path' => 'hot_wheels.jpg'],
            ['Path' => 'jelly_beans.jpg'],
            ['Path' => 'kids_work_toy_blocks.jpg'],
            ['Path' => 'lalaloopsy.jpg'],
            ['Path' => 'lance_cheese_pb_crackers.jpg'],
            ['Path' => 'lance_pb_cookies.jpg'],
            ['Path' => 'lance_pb_crackers.jpg'],
            ['Path' => 'lemoheads.jpg'],
            ['Path' => 'lunch_box.jpg'],
            ['Path' => 'marvel_01.jpg'],
            ['Path' => 'master_card_gift_card.jpg'],
            ['Path' => 'mater.jpg'],
            ['Path' => 'mater_toy_car.jpg'],
            ['Path' => 'maxwell_house.jpg'],
            ['Path' => 'mcqueen_toy_car.jpg'],
            ['Path' => 'mech_pencils.jpg'],
            ['Path' => 'mentos.jpg'],
            ['Path' => 'mickey.jpg'],
            ['Path' => 'mikeandike.jpg'],
            ['Path' => 'minnie_2.jpg'],
            ['Path' => 'minnie_mouse_plush.jpg'],
            ['Path' => 'mixed_berries.jpg'],
            ['Path' => 'mondo.jpg'],
            ['Path' => 'mondo_berry.jpg'],
            ['Path' => 'monster_high.jpg'],
            ['Path' => 'moon_pie.jpg'],
            ['Path' => 'moon_pie_vertical.jpg'],
            ['Path' => 'mountain_racer_toy_car.jpg'],
            ['Path' => 'ninja_turtles_golf_set.jpg'],
            ['Path' => 'no_image_found.jpg'],
            ['Path' => 'notebook_01.jpg'],
            ['Path' => 'notebook_02.jpg'],
            ['Path' => 'notebooks.jpg'],
            ['Path' => 'obd_gloves.jpg'],
            ['Path' => 'obd_snail.jpg'],
            ['Path' => 'obd_squirrel.jpg'],
            ['Path' => 'onion_powder.jpg'],
            ['Path' => 'papermate_black.jpg'],
            ['Path' => 'papermate_colors.jpg'],
            ['Path' => 'papermate_pencils.jpg'],
            ['Path' => 'pencils.jpg'],
            ['Path' => 'perm_markers.jpg'],
            ['Path' => 'pudding_v1.jpg'],
            ['Path' => 'radioshack.jpg'],
            ['Path' => 'red_toy_car.jpg'],
            ['Path' => 'reeses.jpg'],
            ['Path' => 'reeses_pcs.jpg'],
            ['Path' => 'reeses_vertical.jpg'],
            ['Path' => 'regal_gift_card.jpg'],
            ['Path' => 'sesame_street_toy.jpg'],
            ['Path' => 'sharpies_black.jpg'],
            ['Path' => 'sharpies_blue.jpg'],
            ['Path' => 'sharpies_red.jpg'],
            ['Path' => 'shovel.jpg'],
            ['Path' => 'skittles.jpg'],
            ['Path' => 'snickers_bites.jpg'],
            ['Path' => 'solar_1.jpg'],
            ['Path' => 'sour_patch_kids.jpg'],
            ['Path' => 'sour_patch_kids_2.jpg'],
            ['Path' => 'spray_bottle.jpg'],
            ['Path' => 'sprinkler_ring.jpg'],
            ['Path' => 'stacking_chair_01.jpg'],
            ['Path' => 'sugar_babies.jpg'],
            ['Path' => 'texas_pete.jpg'],
            ['Path' => 'toyota_toy_car.jpg'],
            ['Path' => 'umbrella.jpg'],
            ['Path' => 'vanilla_visa_gift_card.jpg'],
            ['Path' => 'visa_gift_card.jpg'],
            ['Path' => 'waste_blue.jpg'],
            ['Path' => 'waste_purple.jpg'],
            ['Path' => 'water_blaster.jpg'],
            ['Path' => 'watercolors.jpg'],
            ['Path' => 'watercolors_2.jpg'],
            ['Path' => 'western_union_gift_card.jpg'],
            ['Path' => 'western_union_reloadable.jpg'],
            ['Path' => 'wise_tortilla.jpg'],
            ['Path' => 'yogurt_raisin.jpg']
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
