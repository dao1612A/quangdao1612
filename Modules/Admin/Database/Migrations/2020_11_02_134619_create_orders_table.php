<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('o_transaction_id')->default(0)->index();
            $table->integer('o_action_id')->default(0)->comment('ID khoa hoc hoac combo hoac cai gi day');
            $table->integer('o_guest_id')->index()->default(0)->comment('ID cua tác nhân tương ứng user');
            $table->tinyInteger('o_sale')->default(0);
            $table->integer('o_destination_id')->default(0)->index()->comment('điểm đến');
            $table->integer('o_starting_point_id')->default(0)->index()->comment('điểm đi');
            $table->integer('o_user_id')->default(0)->index();
            $table->integer('o_vehicle_id')->default(0)->index();
            $table->timestamp('o_time_start')->nullable();
            $table->timestamp('o_time_stop')->nullable();
            $table->date('o_date_success')->nullable();
            $table->integer('o_price')->default(0);
            $table->tinyInteger('o_status')->default(1);
            $table->tinyInteger('o_position')->default(0);
            $table->integer('o_admin_id')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
