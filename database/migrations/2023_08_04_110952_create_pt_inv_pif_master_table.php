<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtInvPifMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pt_inv_pif_master', function (Blueprint $table) {
            $table->id();
            $table->integer('sku_id');
            $table->integer('master_id');
            $table->string('master_code',10);
            $table->integer('master_width_cm');
            $table->integer('master_deep_cm');
            $table->integer('master_height_cm');
            $table->integer('master_width_inch');
            $table->integer('master_deep_inch');
            $table->integer('master_height_inch');
            $table->integer('master_weight_kg');
            $table->integer('master_weight_lbs');
            $table->mediumText('master_box_type');
            $table->integer('per_set');
            $table->integer('per_piece');
            $table->integer('per_nw_kg');
            $table->integer('per_gw_kg');
            $table->integer('per_nw_lbs');
            $table->integer('per_gw_lbs');
            $table->integer('per_cuft');
            $table->integer('per_ctns');
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
        Schema::dropIfExists('pt_inv_pif_master');
    }
}
