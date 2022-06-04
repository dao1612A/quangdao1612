<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_code', function (Blueprint $table) {
            $table->id();
            $table->string('pc_code')->index()->unique();
            $table->integer('pc_price')->default(0);
            $table->integer('pc_user_id')->default(0);
            $table->tinyInteger('pc_status')->default(0);
            $table->tinyInteger('pc_point')->default(0);
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
        Schema::dropIfExists('promotion_code');
    }
}
