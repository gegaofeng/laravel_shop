<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->mediumIncrements('goods_id')->unsigned()->comment('商品ID');
            $table->integer('cat_id')->unsigned()->default('0')->index()->comment('分类ID');
            $table->integer('extend_cat_id')->default('0')->comment('扩展分类ID');
            $table->string('goods_sn')->default('')->index()->comment('商品编号');
            $table->string('goods_name')->comment('商品名称');
            $table->integer('click_count')->unsigned()->comment('点击量');
            $table->smallInteger('brand_id')->unsigned()->default('0')->index()->comment('品牌id');
            $table->smallInteger('store_count')->unsigned()->default('10')->index()->comment('库存');
            $table->smallInteger('comment_count')->default('0')->comment('评论数');
            $table->integer('weight')->unsigned()->default('0')->index()->comment('重量单位克');
            $table->double('volume',10,4)->unsigned()->default('0.0000')->comment('体积立方米');
            $table->decimal('market_price',10,2)->unsigned()->default('0.00')->comment('市场价');
            $table->decimal('shop_price',10,2)->unsigned()->default('0.00')->comment('本店价');
            $table->decimal('cost_price',10,2)->unsigned()->default('0.00')->comment('成本价');
            $table->text('price_ladder')->comment('价格阶梯');
            $table->string('keywords')->default('')->comment('关键词');
            $table->string('goods_remark')->default('')->comment('商品简单描述');
            $table->text('goods_content')->comment('商品详细描述');
            $table->text('mobile_content')->nullable()->comment('手机端详情');
            $table->string('original_img')->comment('商品上传原始图');
            $table->tinyInteger('is_virtual')->unsigned()->default(0)->comment('是否为虚拟商品');
            $table->integer('virtual_indate')->default('0')->comment('有效期');
            $table->smallInteger('virtual_limit')->default('0')->comment('购买上线');
            $table->tinyInteger('virtual_refund')->default('0')->comment('是否允许退款');
            $table->integer('virtual_sales_sum')->unsigned()->default('0')->comment('销售量');
            $table->integer('virtual_collect_sum')->unsigned()->default('0')->comment('收藏量');
            $table->integer('collect_sum')->unsigned()->default('0')->comment('收藏量');
            $table->tinyInteger('is_on_sale')->unsigned()->default('1')->comment('是否上家');
            $table->tinyInteger('is_free_shipping')->unsigned()->default('0')->comment('是否包邮');
            $table->integer('on_time')->unsigned()->default('0')->comment('上架时间');
            $table->integer('sort')->unsigned()->default('50')->index()->comment('排序');
            $table->tinyInteger('is_recommend')->unsigned()->default('0')->comment('是否推荐');
            $table->tinyInteger('is_new')->unsigned()->default('0')->comment('新品');
            $table->tinyInteger('is_hot')->unsigned()->default('0')->comment('热卖');
            $table->integer('last_update')->unsigned()->default('0')->index()->comment('最后更新时间');
            $table->smallInteger('goods_type')->unsigned()->default('0')->comment('商品所属类型id，取值表goods_type的cat_id');
            $table->smallInteger('spec_type')->default('0')->comment('商品规格类型，取值表goods_type的cat_id');
            $table->mediumInteger('give_integral')->unsigned()->default('0')->comment('购买商品赠送积分');
            $table->integer('exchange_integral')->default('0')->comment('积分兑换：0不参与积分兑换，积分和现金的兑换比例见后台配置');
            $table->smallInteger('suppliers->id')->unsigned()->default('0')->comment('供货商ID');
            $table->integer('sales_sum')->default('0')->comment('销量');
            $table->tinyInteger('prom_type')->default('0')->comment('0默认1抢购2团购3优惠促销4预售5虚拟(5其实没用)6拼团7搭配购');
            $table->integer('prom_id')->default('0')->comment('优惠活动id');
            $table->decimal('commission',10,2)->default('0.00')->comment('佣金用于分销分成');
            $table->string('spu')->default('')->comment('SPU');
            $table->string('sku')->default('')->comment('SKU');
            $table->integer('template_id')->unsigned()->default('0')->comment('运费模板ID');
            $table->string('video')->default('')->comment('视频');
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
        Schema::dropIfExists('goods');
    }
}
