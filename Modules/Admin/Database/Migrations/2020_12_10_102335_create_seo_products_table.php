<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_products', function (Blueprint $table) {
            $table->id();
            $table->string('sp_slug')->nullable();
            $table->string('sp_md5')->unique()->index();
            $table->tinyInteger('sp_type')->default(1)->comment('1 keyword, 2 category, 3 product');
            $table->integer('sp_id')->default(0);
            $table->unique(['sp_id','sp_type','sp_md5']);
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
        Schema::dropIfExists('seo_products');
    }
}
