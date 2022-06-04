<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('v_user_id')->default(0)->index();
            $table->integer('v_id')->default(0)->index();
            $table->tinyInteger('v_number')->default(0);
            $table->text('v_content')->nullable();
            $table->tinyInteger('v_status')->default(1);
            $table->tinyInteger('v_type')->default(0)->comment("Tiện ích, Thông tin, An toàn, Chất lượng, Thái độ");
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
        Schema::dropIfExists('votes_detail');
    }
}
