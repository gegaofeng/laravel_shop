<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->string('name')->default(null);
            $table->string('logo')->default(null);
            $table->text('desc')->comment('品牌描述');
            $table->string('url')->default('');
            $table->smallInteger('sort')->unsigned()->default(50);
            $table->string('cat_name')->default('')->comment('品牌分类名称');
            $table->smallInteger('parent_cat_id')->default(0);
            $table->smallInteger('cat_id')->default(0);
            $table->tinyInteger('is_hot')->default(0)->comment('是否推荐');
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
        Schema::dropIfExists('brands');
    }
}
