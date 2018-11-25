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
            $table->mediumIncrements('order_id')->unsigned()->comment('订单id');
            $table->string('order_sn')->default('')->comment('订单编号');
            $table->mediumInteger('user_id')->unsigned()->default(0)->comment('用户id');
            $table->tinyInteger('order_status')->unsigned()->default(0)->comment('订单状态');
            $table->tinyInteger('shipping_status')->unsigned()->default(0)->comment('发货状态');
            $table->tinyInteger('pay_status')->unsigned()->default(0)->comment('支付状态');
            $table->string('consignee')->default('')->comment('收货人');
            $table->integer('country')->unsigned()->default(0)->comment('国家');
            $table->integer('province')->unsigned()->default(0)->comment('省份');
            $table->integer('city')->unsigned()->default(0)->comment('城市');
            $table->integer('district')->unsigned()->default(0)->comment('县区');
            $table->integer('town')->unsigned()->default(0)->comment('乡镇');
            $table->string('address')->default('');
            $table->string('zipcode')->default('');
            $table->string('mobile')->default('');
            $table->string('email')->default('');
            $table->string('shipping_code')->default('');
            $table->string('shipping_name')->default('');
            $table->string('pay_code')->default('');
            $table->string('pay_name')->default('');
            $table->string('invoice_tilte')->default('');
            $table->string('taxpayer')->default('');
            $table->decimal('goods_price',10,2)->default(0.00);
            $table->decimal('shipping_price',10,2)->default(0.00);
            $table->decimal('user_money',10,2)->default(0.00);
            $table->decimal('coupon_price',10,2)->default(0.00);
            $table->integer('integral')->unsigned()->default(0);
            $table->decimal('integral_money')->default(0.00);
            $table->decimal('order_amount',10,2)->default(0.00);
            $table->decimal('total_amount',10,2)->default(0.00);
            $table->integer('add_time')->unsigned()->default(0);
            $table->integer('shipping_time')->unsigned()->default(0);
            $table->integer('confirm_time')->unsigned()->default(0);
            $table->integer('pay_time')->unsigned()->default(0);
            $table->string('transaction_id')->default('');
            $table->integer('prom_id')->unsigned()->default(0);
            $table->tinyInteger('prom_type')->unsigned()->default(0);
            $table->smallInteger('order_prom_id')->unsigned()->default(0);
            $table->decimal('order_prom_amount',10,2)->default(0.00);
            $table->decimal('discount',10,2)->default(0.00);
            $table->string('user_note')->default('');
            $table->string('admin_note')->default('');
            $table->string('parent_sn')->default('');
            $table->tinyInteger('is_distribute')->default(0);
            $table->decimal('paid_money')->default(0.00);
            $table->integer('shop_id')->unsigned()->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            $table->unique('order_sn','order_sn');
            $table->index('user_id','user_id');
            $table->index('add_time','add_time');
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
