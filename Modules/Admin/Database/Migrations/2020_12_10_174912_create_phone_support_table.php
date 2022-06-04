<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneSupportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_support', function (Blueprint $table) {
            $table->id();
            $table->string('ps_name')->nullable();
            $table->string('ps_phone')->nullable();
            $table->string('ps_desc')->nullable();
            $table->tinyInteger('ps_sort')->nullable();
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
        Schema::dropIfExists('phone_support');
    }
}
