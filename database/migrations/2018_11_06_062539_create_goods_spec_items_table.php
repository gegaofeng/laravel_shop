<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsSpecItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_spec_items', function (Blueprint $table) {
            $table->increments('id')->comment('规格项id');
            $table->integer('spec_id')->default(null)->comment('规格名称Id');
            $table->string('item')->default(null)->comment('规格项,规格内容');
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
        Schema::dropIfExists('goods_spec_items');
    }
}
