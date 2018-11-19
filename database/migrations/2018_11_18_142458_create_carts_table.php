<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('购物车表');
            $table->mediumInteger('user_id')->unsigned()->default(0)->comment('用户id');
            $table->string('session_id')->default('')->comment('session');
            $table->mediumInteger('goods_id')->unsigned()->default(0)->comment('商品id');
            $table->string('goods_sn')->default('')->comment('商品货号');
            $table->string('goods_name')->default('0')->comment('商品名称');
            $table->decimal('market_price',10,2)->unsigned()->default(0.00)->comment('市场价');
            $table->decimal('goods_price',10,2)->unsigned()->default(0.00)->comment('本店价');
            $table->decimal('member_goods_price',10,2)->unsigned()->default(0.00)->comment('会员价');
            $table->smallInteger('goods_num')->unsigned()->default(0)->comment('购买数量');
            $table->integer('item_id')->unsigned()->comment('规格id');
            $table->string('spec_key')->default('')->comment('商品规格key 对应tp_spec_goods_price 表');
            $table->string('spec_key_name')->default(0)->comment('规格组合名称呢');
            $table->string('bar_code')->default('')->comment('商品条码');
            $table->tinyInteger('selected')->default(1)->comment('选中状态');
            $table->integer('add_time')->default(0)->comment('加入时间');
            $table->tinyInteger('prom_type')->default(0)->comment('0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠,7 搭配购');
            $table->integer('prom_id')->default(0)->comment('活动id');
            $table->string('sku')->default('')->comment('sku');
            $table->integer('combination_group_id')->unsigned()->default(0)->comment('搭配购的组id/cart_id');
            $table->timestamps();
            $table->index('session_id');
            $table->index('user_id');
            $table->index('goods_id');
            $table->index('spec_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
