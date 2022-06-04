<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('c_name');
            $table->string('c_slug')->unique();
            $table->string('c_icon')->nullable();
            $table->tinyInteger('c_sort')->default(0);
            $table->tinyInteger('c_status')->default(1);
            $table->tinyInteger('c_hot')->default(0);
            $table->integer('c_parent_id')->default(0)->index();
            $table->string('c_child_all')->nullable();
            $table->string('c_parent_all')->nullable();
            $table->string('c_title_seo')->nullable();
            $table->string('c_avatar')->nullable();
            $table->tinyInteger('c_position')->default(0);
            $table->string('c_keyword_seo')->nullable();
            $table->string('c_description_seo')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
