<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsSpecPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_spec_prices', function (Blueprint $table) {
            $table->increments('item_id');
            $table->integer('goods_id')->default('0');
            $table->string('key')->nullable()->comment('规格键名');
            $table->string('key_name')->nullable();
            $table->decimal('price',10,2)->default(null);
            $table->decimal('market_price',10,2)->unsigned()->default(0.00);
            $table->decimal('cost_price',10,2)->unsigned()->default(0.00)->comment('成本价');
            $table->decimal('commission',10,2)->unsigned()->default(0.00)->comment('佣金');
            $table->integer('store_count')->unsigned()->default(10);
            $table->string('bar_code')->default('')->comment('商品条形码');
            $table->string('sku')->default('')->comment('SKU');
            $table->string('spec_img')->default(null);
            $table->integer('prom_id')->default(0)->comment('活动ID');
            $table->tinyInteger('prom_type')->default(0)->comment('参加活动类型');
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
        Schema::dropIfExists('goods_spec_prices');
    }
}
