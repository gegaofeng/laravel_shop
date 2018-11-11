<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsSpec extends Model
{
    //
    public function goodsSpecItem(){
        return $this->hasMany(GoodsSpecItem::class,'spec_id','id');
    }
}
