<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_keywords', function (Blueprint $table) {
            $table->id();
            $table->integer('ak_article_id')->default(0)->index();
            $table->integer('ak_keyword_id')->default(0)->index();
            $table->unique(['ak_article_id','ak_keyword_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_keywords');
    }
}
