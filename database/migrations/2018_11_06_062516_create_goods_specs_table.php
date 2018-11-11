<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_specs', function (Blueprint $table) {
            $table->increments('id')->comment('规格表id');
            $table->integer('type_id')->default(0)->comment('规格类型');
            $table->string('name')->comment('规格名称');
            $table->tinyInteger('order')->default(50)->comment('排序顺序');
            $table->tinyInteger('search_index')->default(1)->comment('是否检索');
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
        Schema::dropIfExists('goods_specs');
    }
}
