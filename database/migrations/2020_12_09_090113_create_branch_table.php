<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch', function (Blueprint $table) {
            $table->id();
            $table->string('b_address')->nullable();
            $table->string('b_title')->nullable();
            $table->string('b_slug')->nullable();
            $table->string('b_business_hours')->nullable();
            $table->string('b_phone')->nullable();
            $table->text('b_map')->nullable();
            $table->integer('b_location_city_id')->default(0)->index();
            $table->integer('b_location_district_id')->default(0)->index();
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
        Schema::dropIfExists('branch');
    }
}
