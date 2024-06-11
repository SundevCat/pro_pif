<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtInvPifLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pt_inv_pif_log', function (Blueprint $table) {
            $table->id();
            $table->integer('update_id');
            $table->integer('sku_id');
            $table->string('column_name',50);
            $table->longText('old_data');
            $table->longText('new_data');
            $table->timestamp('update_date');
            $table->string('updated_by',30);
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
        Schema::dropIfExists('pt_inv_pif_log');
    }
}
