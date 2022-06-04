<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFullTextSearchTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            \DB::statement('ALTER TABLE admins ADD FULLTEXT `address` (`address`)'); //đánh index cho cột name
            \DB::statement('ALTER TABLE admins ENGINE = MyISAM'); //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            \DB::statement('ALTER TABLE admins DROP INDEX address');
        });

    }
}
