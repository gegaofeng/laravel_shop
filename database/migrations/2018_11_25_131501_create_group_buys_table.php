<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_buys', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title')->default('');
            $table->increments('start_time')->unsigned()->default(0);
            $table->increments('end_time')->unsigned()->default(0);
            $table->increments('goods_id')->unsigned()->default(0);
            $table->bigInteger('item_id')->default(0);
            $table->decimal('price',10,2)->default(0.00);
            $table->integer('goods_num')->unsigned()->default(0);
            $table->integer('buy_num')->unsigned()->default(0);
            $table->integer('order_num')->unsigned()->default(0);
            $table->integer('virtual_num')->unsigned()->default(0);
            $table->decimal('rebate',10,2)->default(0.00);
            $table->text('intro')->default('');
            $table->decimal('goods_price',10,2)->default(0.00);
            $table->string('goods_name')->default('');
            $table->tinyInteger('recommended')->unsigned()->default(0);
            $table->integer('views')->unsigned()->default(0);
            $table->tinyInteger('is_end')->default(0);
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
        Schema::dropIfExists('group_buys');
    }
}
