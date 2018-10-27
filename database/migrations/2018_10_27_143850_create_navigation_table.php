<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('shop_navigation',function (Blueprint $table){
            $table->increments('id')->comment('前台导航表');
            $table->string('name')->default('')->comment('导航名称');
            $table->tinyInteger('is_show')->default('1')->comment('是否显示');
            $table->tinyInteger('is_new')->default('1')->comment('是否新窗口');
            $table->smallInteger('sort')->default('50')->comment('排序');
            $table->string('url')->default('')->comment('链接地址');
            $table->enum('position',['top','bottom'])->default('top')->comment('菜单未知');
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
        //
    }
}
