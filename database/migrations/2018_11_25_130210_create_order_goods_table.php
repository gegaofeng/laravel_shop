<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_goods', function (Blueprint $table) {
            $table->mediumIncrements('rec_id')->unsigned()->comment('自增id');
            $table->mediumInteger('order_id')->unsigned()->default(0)->comment('订单id');
            $table->mediumInteger('goods_id')->unsigned()->default(0)->comment('商品id');
            $table->string('goods_name')->default('');
            $table->string('goods_sn')->default('')->comment('商品货号');
            $table->smallInteger('goods_num')->unsigned()->default(1)->comment('购买数量');
            $table->decimal('final_price',10,2)->default(0.00)->comment('实际购买价格');
            $table->decimal('goods_price',10,2)->default(0.00)->comment('本店价格');
            $table->decimal('cost_price',10,2)->default(0.00)->comment('成本价');
            $table->decimal('member_goods_price',10,2)->default(0.00)->comment('会员价');
            $table->mediumInteger('give_integral')->default(0)->comment('赠送积分');
            $table->string('spec_key')->nullable()->default('')->comment('商品规格key');
            $table->string('spec_key_name')->nullable()->default('')->comment('规格名称');
            $table->string('bar_code')->default('')->comment('条码');
            $table->tinyInteger('is_comment')->default(0)->comment('是否评价');
            $table->tinyInteger('prom_type')->unsigned()->default(0)->comment('0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠,4预售');
            $table->integer('prom_id')->unsigned()->default(0)->comment('活动id');
            $table->tinyInteger('is_send')->nullable()->default(0)->comment('0未发货，1已发货，2已换货，3已退货');
            $table->integer('delivery_id')->unsigned()->default(0)->comment('发货单id');
            $table->string('sku')->default('')->comment('sku');
            $table->timestamps();
            $table->index('order_id','order_id');
            $table->index('goods_id','goods_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_goods');
    }
}
