<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_categories', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned()->comment('商品分类ID');
            $table->string('name')->comment('商品分类');
            $table->string('mobile_name')->comment('手机端分类');
            $table->smallInteger('parent_id')->unsigned()->default('0')->comment('父ID');
            $table->string('parent_id_path')->comment('家族图谱');
            $table->tinyInteger('level')->default('0')->comment('等级');
            $table->tinyInteger('sort_order')->unsigned()->default('50')->comment('排序顺序');
            $table->tinyInteger('is_show')->unsigned()->default('1')->comment('是否显示');
            $table->string('image')->comment('分类图片');
            $table->tinyInteger('is_hot')->default('0')->comment('是否为推荐热门分类');
            $table->tinyInteger('cat_group')->default('0')->comment('分类分组');
            $table->tinyInteger('commission_rate')->default('0')->comment('分佣比例');
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
        Schema::dropIfExists('good_categories');
    }
}
