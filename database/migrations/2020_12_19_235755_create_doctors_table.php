<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('job')->nullable();
            $table->string('email')->unique();
            $table->string('slug')->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->integer('location_id')->default(0);
            $table->text('about')->nullable();
            $table->string('avatar')->nullable();
            $table->char('phone',15)->nullable();
            $table->integer('point')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->integer('vote_number')->default(0);
            $table->integer('vote_total')->default(0);
            $table->tinyInteger('money_level')->default(0);
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
        Schema::dropIfExists('doctors');
    }
}
