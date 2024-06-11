<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtInvPifFgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // protected $connection = 'mysql';

    public function up()
    {
        Schema::connection('mysql')->create('pt_inv_pif_fg', function (Blueprint $table) {
            $table->id();
            $table->integer('sku_id');
            $table->string('sku_code',4);
            $table->string('sku_7digit',10);
            $table->text('sku_name');
            $table->string('product_year',4);
            $table->text('category');
            $table->text('catalog_status');
            $table->string('age',20);
            $table->string('ean_barcode',20);
            $table->string('flag_dia',1);
            $table->integer('product_width_inch');
            $table->integer('product_length_inch');
            $table->integer('product_height_inch');
            $table->integer('procuct_weight_lbs');
            $table->text('size_biggest');
            $table->integer('product_width_cm');
            $table->integer('product_length_cm');
            $table->integer('product_height_cm');
            $table->integer('procuct_weight_kg');
            $table->longText('sku_description');
            $table->text('care_instruction');
            $table->text('assembly_instruction');
            $table->text('caution_sheet');
            $table->text('how_to_play');
            $table->text('award_1');
            $table->text('award_2');
            $table->text('award_3');
            $table->text('award_4');
            $table->text('award_5');
            $table->text('award_6');
            $table->text('child_dev_1');
            $table->text('child_dev_2');
            $table->text('child_dev_3');
            $table->text('child_dev_4');
            $table->text('child_dev_5');
            $table->text('child_dev_6');
            $table->integer('pieces_count');
            $table->text('compositions');
            $table->text('prop65');
            $table->text('choking_hazard');
            $table->text('warning_label');
            $table->text('list_of_accessories');
            $table->text('dimension_cm');
            $table->text('dimension_inch');
            $table->text('colors');
            $table->mediumText('lifestyle_img_1');
            $table->mediumText('lifestyle_img_2');
            $table->mediumText('lifestyle_img_3');
            $table->mediumText('lifestyle_img_4');
            $table->mediumText('lifestyle_img_5');
            $table->mediumText('lifestyle_img_6');
            $table->mediumText('lifestyle_img_7');
            $table->mediumText('lifestyle_img_8');
            $table->mediumText('lifestyle_img_9');
            $table->mediumText('lifestyle_img_10');
            $table->mediumText('main_image');
            $table->mediumText('product_img_1');
            $table->mediumText('product_img_2');
            $table->mediumText('product_img_3');
            $table->mediumText('product_img_4');
            $table->mediumText('product_img_5');
            $table->mediumText('product_img_6');
            $table->mediumText('product_img_7');
            $table->mediumText('product_img_8');
            $table->mediumText('product_img_9');
            $table->mediumText('package_front');
            $table->mediumText('package_back');
            $table->mediumText('package_top');
            $table->mediumText('package_bottom');
            $table->mediumText('package_left');
            $table->mediumText('package_right');
            $table->mediumText('package_shot_1');
            $table->mediumText('package_shot_2');
            $table->mediumText('package_shot_3');
            $table->mediumText('package_shot_4');
            $table->mediumText('bullet_point_1');
            $table->mediumText('bullet_point_2');
            $table->mediumText('bullet_point_3');
            $table->mediumText('bullet_point_4');
            $table->longText('long_description');
            $table->text('plastic_type');
            $table->text('plastic_location');
            $table->integer('nrf_color_number');
            $table->text('nrf_color_name');
            $table->integer('max_child_height_cm');
            $table->integer('max_child_weight_kg');
            $table->string('planwood',1);
            $table->integer('carbon_footprint_kg');
            $table->integer('carbon_footprint_lbs');
            $table->timestamp('creation_date');
            $table->string('created_by',50);
            $table->timestamp('last_update_date')->nullable($value = true);
            $table->string('last_updated_by',50);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pt_inv_pif_fg');
    }
}
