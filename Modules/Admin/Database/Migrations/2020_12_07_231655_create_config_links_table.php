<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_links', function (Blueprint $table) {
            $table->id();
            $table->string('cl_title')->nullable();
            $table->tinyInteger('cl_sort')->default(1);
            $table->text('cl_list_link')->nullable();
            $table->tinyInteger('cl_position')->default(0);
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
        Schema::dropIfExists('config_links');
    }
}
