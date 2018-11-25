<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlashSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flash_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('');
            $table->integer('goods_id')->default(0);
            $table->bigInteger('item_id')->default(0);
            $table->decimal('price',10,2)->default(0.00);
            $table->integer('goods_num')->unsigned()->default(1);
            $table->integer('buy_limit')->unsigned()->default(1);
            $table->integer('buy_num')->unsigned()->default(0);
            $table->integer('order_num')->unsigned()->default(0);
            $table->text('description')->default('');
            $table->integer('start_time')->default(0);
            $table->integer('end_time')->default(0);
            $table->tinyInteger('is_end')->default(0);
            $table->string('goods_name')->default('');
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
        Schema::dropIfExists('flash_sales');
    }
}
