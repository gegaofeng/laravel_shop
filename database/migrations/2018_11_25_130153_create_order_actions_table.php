<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_actions', function (Blueprint $table) {
            $table->mediumIncrements('adtion_id')->unsigned();
            $table->mediumInteger('order_id')->unsigned()->default(0);
            $table->integer('action_user')->default(0);
            $table->tinyInteger('order_status')->unsigned()->default(0);
            $table->tinyInteger('shipping_status')->unsigned()->default(0);
            $table->tinyInteger('pay_status')->unsigned()->default(0);
            $table->string('action_note')->default('');
            $table->integer('log_time')->unsigned()->default(0);
            $table->string('status_desc')->default('');
            $table->timestamps();
            $table->index('order_id','order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_actions');
    }
}
