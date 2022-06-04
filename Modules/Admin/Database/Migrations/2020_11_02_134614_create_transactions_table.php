<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('t_user_id')->default(0)->index();
            $table->integer('t_admin_id')->default(0);
            $table->integer('t_total_money')->default(0);
            $table->char('t_code')->nullable();
            $table->text('t_note')->nullable();
            $table->string('t_phone')->nullable();
            $table->string('t_name')->nullable();
            $table->string('t_address')->nullable();
            $table->string('t_time_text')->nullable();
            $table->date('t_date')->nullable();
            $table->integer('t_document_id')->default(0)->index();
            $table->tinyInteger('t_type_pay')->default(1);
            $table->text('t_note_user')->nullable();
            $table->tinyInteger('t_status')->default(1)->nullable();
            $table->timestamp('t_time_process')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
