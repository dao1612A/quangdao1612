<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnPositionInTableTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->tinyInteger('t_position_1')->after('t_hot')->default(0);
            $table->tinyInteger('t_position_2')->after('t_hot')->default(0);
            $table->tinyInteger('t_position_3')->after('t_hot')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn(['t_position_1','t_position_2','t_position_3']);
        });
    }
}
