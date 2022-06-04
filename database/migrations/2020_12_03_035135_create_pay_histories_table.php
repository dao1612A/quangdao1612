<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ph_user_id')->index();
            $table->unsignedInteger('ph_credit')->default(0)->comment('Số tiền tăng');
            $table->unsignedInteger('ph_debit')->default(0)->comment('số tiền giảm');
            $table->unsignedInteger('ph_balance')->default(0)->comment('Số tiền hiện tại');
            $table->text('ph_meta_detail')->nullable();
            $table->tinyInteger('ph_status')->default(0);
            $table->unsignedTinyInteger('ph_month')->nullable();
            $table->unsignedSmallInteger('ph_year')->nullable();
            $table->index(['ph_user_id'], 'index_code_user_id');
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
        Schema::dropIfExists('pay_histories');
    }
}
