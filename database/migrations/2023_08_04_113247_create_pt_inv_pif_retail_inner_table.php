<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtInvPifRetailInnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pt_inv_pif_retail_inner', function (Blueprint $table) {
            $table->id();
            $table->integer('sku_id');
            $table->integer('master_id');
            $table->string('retail_code',10);
            $table->integer('retail_width_cm');
            $table->integer('retail_deep_cm');
            $table->integer('retail_height_cm');
            $table->integer('retail_width_inch');
            $table->integer('retail_deep_inch');
            $table->integer('retail_height_inch');
            $table->integer('retail_weight_kg');
            $table->integer('retail_weight_lbs');
            $table->mediumText('retail_box_type');
            $table->integer('retail_pack_box');
            $table->integer('product_retail_w_lbs');
            $table->integer('product_retail_w_kg');
            $table->string('inner_code',10);
            $table->integer('inner_width_cm');
            $table->integer('inner_deep_cm');
            $table->integer('inner_height_cm');
            $table->integer('inner_width_inch');
            $table->integer('inner_deep_inch');
            $table->integer('inner_height_inch');
            $table->integer('inner_weight_kg');
            $table->integer('inner_weight_lbs');
            $table->mediumText('inner_box_type');
            $table->integer('inner_pack_box');
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
        Schema::dropIfExists('pt_inv_pif_retail_inner');
    }
}
