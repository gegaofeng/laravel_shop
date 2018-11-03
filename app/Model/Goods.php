<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $primaryKey='goods_id';
    public function goodsImages(){
        return $this->hasMany(GoodsImages::class,'goods_id','goods_id');
    }
}
