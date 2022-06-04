<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavbarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbars', function (Blueprint $table) {
            $table->id();
            $table->string('nb_name')->nullable();
            $table->string('nb_url')->nullable();
            $table->char('nb_icon',15)->nullable();
            $table->char('nb_rel',15)->nullable();
            $table->tinyInteger('nb_status')->nullable();
            $table->tinyInteger('nb_type')->nullable()->comment('url, menu, article, product, tag');
            $table->integer('nb_id')->default(0)->comment('Menu, keyword, article, product, tag');
            $table->integer('nb_parent_id')->default(0)->index();
            $table->tinyInteger('nb_sort')->default(0);
            $table->tinyInteger('is_child')->default(0);
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
        Schema::dropIfExists('navbars');
    }
}
